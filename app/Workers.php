<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $table = 'workers';
    protected $fillable = ['name', 'duration', 'communicative', 'speed', 'technologies'];

    /*
     * Add new project
     */
    public function store(array $data)
    {
        $item = Workers::create($data);

        return $this->one($item['id']);
    }

    public function upgrade(int $id, array $data){
        $item = $this->one($id);

        if(!$item){
            return false;
        }

        $item->update($data);

        return $this->one($id);
    }

    public function one(int $id)
    {
        $item = Workers::find($id);

        return $item;
    }

    public function many(array  $params)
    {
        $page = $params['page'] ?? 1;
        $limit = $params['limit'] ?? 5;

        $items = Workers::withCount('vacancies')
            ->limit($limit)
            ->withTrashed()
            ->offset(($page - 1) * $limit);
//        $total = $this->model->count();

        //$projects = Projects::all();

        return $items;
    }

    public function remove(int $id)
    {
        $item = Projects::find($id);

        if(!$item){
            return false;
        }

        return $item->delete();
    }
}
