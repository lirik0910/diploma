<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Workers;

class ProjectsController extends Controller
{
    private $model;
    private $workersModel;

    public function __construct(Projects $model, Workers $workersModel)
    {
        $this->model = $model;
        $this->workersModel = $workersModel;
    }

    public function create(Request $request)
    {
        $data = $request->only(['name', 'duration', 'technologies', 'communicative', 'speed']);

        $project = $this->model->store($data);

        return $project;
    }

    public function one($id, Request $request)
    {

    }

    public function all(Request $request)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function delete(Request $request)
    {

    }

    public function choose($id, Request $request)
    {
        //$id = $request->only('id') ?? 1;
        $type = 'backend';

        $project = $this->model->one($id);

        if(!$project){
            return false;
        }

        // V
        $weights = [];

        $priorities = explode(',', $project->priorities);

        $criteriasWeight = [
            '1' => 0.06,
            '2' => 0.09,
            '3' => 0.12,
            '4' => 0.15,
            '5' => 0.18,
            '6' => 0.21,
            '7' => 0.24,
            '8' => 0.27,
            '9' => 0.3,
            '10' => 0.33,
        ];


        $i = 1;
        foreach ($priorities as $item){
            $weights[$i] = $criteriasWeight[$item];
            $i++;
        }

        $workers = Workers::all();


        $pareto = $this->setPareto($workers, $project, $weights, $type);

        $convertArr = $this->convertValues($project, $pareto);

        $p = [];

        foreach ($convertArr as $item){
            $p[1][] = $item[1];
            $p[2][] = $item[2];
            $p[3][] = $item[3];
            $p[4][] = $item[4];
        }

        $newP = [];
        foreach ($p as $key => $item){
            $p[$key] = 0.0;
            foreach($item as $it){
                $p[$key] += $it;
            }
        }

        foreach ($p as $key => $item){
            $p[$key] = $item / 3;
        }

        $R1 = 0.0;
        $R2 = 0.0;
        $R3 = 0.0;
        $R4 = 0.0;

        $results = [];
        foreach($convertArr as $key => $item){
            $results[$key][1] = $item[1] + $weights[1];
            $results[$key][2] = $item[2] + $weights[2];
            $results[$key][3] = $item[3] + $weights[3];
            $results[$key][4] = $item[4] + $weights[4];
        }

        $finalResults = [];
        foreach($results as $id => $item){
            $finalResults[$id] = 0.0;
            foreach ($item as $val){
                $finalResults[$id] += $val;
            }
        }

        $max = max($finalResults);
        $id = array_search($max, $finalResults);

        return $finalResults;

        return $this->workersModel->one($id);
    }

    public function setPareto($workers, $project, $weights, $type){
        $technologies = explode(';', $project->technologies);
        $tech = [];
        $pareto = [];

        arsort($weights);

        $i = 1;
        foreach($weights as $key => $value){
            if($i < 4){
                if($key === 1){
                    $w = $workers->sortByDesc('communicative')->first();
                    $pareto[$w->id] = $w;
                } elseif ($key === 2){
                    $w = $workers->whereIn('duration', $project->duration)->first() ;
                    $pareto[$w->id] = $w;
                } elseif ($key === 3){
                    $w = $workers->where('technologies', 'ilike', '%' . $type . '%')->first();
                    $pareto[$w->id] = $w;
                } elseif ($key === 4){
                    $w = $workers->sortByDesc('speed')->first();
                    $pareto[$w->id] = $w;
                }

                $i++;
            }
        }


        return $pareto;

    }

    public function convertValues($project, $pareto)
    {
        $projectDuration = $project->duration;
        $projectTech = $project->technologies;

        //$o = 0;
        $values = [];
        foreach ($pareto as $id => $item){


            if($item->duration === $projectDuration){
                $values[$id][2] = 0.99;
            } elseif ($item->duration !== $projectDuration){
                $values[$id][2] = 0.66;
            }

            if(count(explode('.', explode(';', $projectTech)[1])) > 2){
                $values[$id][3] = 0.99;
            } else{
                $values[$id][3] = 0.66;
            }

            $values[$id][1] = $item->communicative;
            $values[$id][4] = $item->speed;
        }
        return $values;
    }


    /*public function checkTechnology($technologies, $skills, $type)
    {
        foreach ($technologies as $technology){
            $arr = explode('.', $technology);
            $tech[$arr[0]] = $arr;
            //var_dump($arr); die;
        }

        foreach ($skills as $skill){
            $arr = explode('.', $skill);
            $skl[$arr[0]] = $arr;
        }

        foreach ($tech as $tK => $tV){
            foreach($skl as $sK => $sV){
                var_dump($tK, $tV, $sK, $sV); die;
            }
        }
    }*/

}
