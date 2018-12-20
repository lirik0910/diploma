<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\CriteriaVacancyCollection;
use Illuminate\Http\Request;
use App\Vacancy;
use App\Worker;

class VacancyController extends Controller
{
    private $model;
    private $workersModel;

    public function __construct(Vacancy $model, Worker $workersModel)
    {
        $this->model = $model;
        $this->workersModel = $workersModel;
    }

    public function create(Request $request)
    {
        //var_dump($request->all()); die;
        $data = $request->only(['name', 'criterias', 'project_id']);

        $item = $this->model->create($data);

        foreach ($data['criterias'] as $key => $value){
            $criteria = Criteria::where('title', $key)->first();

            CriteriaVacancyCollection::create([
                'vacancy_id' => $item->id,
                'criteria_id' => $criteria->id,
                'value' => $value
            ]);
        }

        return $this->one($item['id']);
    }

    public function update($id, Request $request)
    {
        $data = $request->only(['name', 'worker_id', 'criterias']);


        if($data['worker_id']){
            $data['status'] = true;
        }

        //$criterias = $data['criterias'];
        //unset($data['criterias']);

        $item = $this->model->find($id);

        $item->update($data);
//var_dump($data['criterias']); die;
        foreach ($data['criterias'] as $key => $value){
            $criteria = Criteria::where('title', $key)->first();

            $crit = CriteriaVacancyCollection::where(['vacancy_id' => $id, 'criteria_id' => $criteria->id])->first();


            $crit->update(['value' => $value]);
        }

        return redirect(Request::url());

    }

    public function one($id)
    {
        $item = $this->model->find($id);

        return $item;
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        $projectId = $item->project_id;

        if(!$item){
            return false;
        }

        $res = $item->delete();

        return redirect('/projects/' . $projectId);
    }

    public function choose(Request $request)
    {
        $id = (int) $request->only('id');

        $vacancy = $this->model->where('id', $id)->with('criterias')->first();
        $workers = $this->workersModel->where('status', false)->with('characteristics')->get();

        $evals = [];

        foreach($vacancy->criterias as $crit){
            $cr_val = $crit->pivot->value;
            foreach ($workers as $worker){
                //foreach ($worker->characteristics as $char){
                $char = $worker->characteristics->where('title', $crit->title)->first();
                    $ch_val = $char->pivot->value;
                    if($crit->title === 'technologies'){
                        if(!is_array($cr_val)){
                            $cr_val = explode(', ', $cr_val);
                        }
                        if(!is_array($ch_val)){
                            $ch_val = explode(', ', $ch_val);
                        }
                        $res = round(count(array_intersect($ch_val, $cr_val)) / count($cr_val), 2);
                        //var_dump($res); die;

                        $evals[$worker->id][$crit->title] = $res;
                    } elseif ($crit->title === 'communicative'){
                        if($cr_val === 'none'){
                            $res = (int)$ch_val * 0.01 * 0.99;
                        } elseif ($cr_val === 'part'){
                            $res = (int)$ch_val * 0.01 * 0.66;
                        } else{
                            $res = (int)$ch_val * 0.01 * 0.33;
                        }

                        $evals[$worker->id][$crit->title] = $res;
                    } elseif ($crit->title === 'period'){
                        if($cr_val === 'short' && $ch_val === 'long' || $cr_val === 'long' && $ch_val ==='short'){
                            $res = 0.33;
                        } elseif ($cr_val === $ch_val){
                            $res = 0.99;
                        } else{
                            $res = 0.66;
                        }

                        $evals[$worker->id][$crit->title] = $res;
                    } elseif ($crit->title === 'terms'){
                        if($cr_val === 'hot'){
                            $res = (int)$ch_val * 0.01 * 0.99;
                        } elseif ($cr_val === 'normal'){
                            $res = (int)$ch_val * 0.01 * 0.66;
                        } else{
                            $res = (int)$ch_val * 0.01 * 0.33;
                        }

                        $evals[$worker->id][$crit->title] = $res;
                    }
                //}
            }
        }
        //var_dump($evals); die;
        //var_dump($vacancy, $workers); die;

        /*Находим средние оценки по каждому критерию*/
        $P = [];
        $J = [];

        foreach ($evals as $eval){
            foreach($eval as $key => $value){
                $J[$key][] = $value;
                if(!empty($P[$key])){
                    $P[$key] += $value;
                } else{
                    $P[$key] = $value;
                }
            }
        }

        foreach ($P as $key=> $p){
            $P[$key] = $p / count($evals);
        }

        /* Находим величину разброса по каждому критерию */

        $R = [];
//var_dump($P); die;
        foreach($J as $key => $values){
            foreach($values as $val){
                if(!empty($R[$key])){
                    $R[$key] += abs($val - $P[$key]);
                } else{
                    $R[$key] = abs($val - $P[$key]);
                }
                //var_dump($key, $values);
                //var_dump($val);

            }
            $R[$key] = $R[$key] / (3 * $P[$key]);
        }

        /* Находим суммы величин разброса */

        $S = 0;
        foreach ($R as $r){
            $S += $r;
        }

        /* Находим веса критериев, которые отображают разброс оценок */

        $Z = [];

        foreach ($R as $key => $r){
            $Z[$key] = $r / $S;
        }

        $overall = [];

        foreach($evals as $idi => $eval){
            $tmp = 0;
            foreach($eval as $key => $value){
                //var_dump($key, $value); die;
                $tmp += $value * $Z[$key];
            }
            $overall[$idi] = round($tmp, 4);
        }

        foreach ($workers as $worker){
            $worker->overall = $overall[$worker->id];
        }

        $workers->sortBy('overall')->take(5);
        //var_dump($workers); die;
        //var_dump($worker->characteristic); die;
        return view('component.vacancy_workers_list', ['workers' => $workers]);
    }

}
