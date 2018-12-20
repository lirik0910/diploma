<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';
    protected $fillable = ['name', 'description', 'status_id'];


    public function status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
    /*
     * Add new project
     */
    public function store(array $data)
    {
        $item = Project::create($data);

        return $this->one($item['id']);
    }

    public function many()
    {
        $items = Project::all();

        return $items;
    }

    public function upgrade(int $id, array $data){
        $item = Project::find($id);

        if(!$item){
            return false;
        }
//var_dump($item); die;
        $item->update($data);

        return $this->one($id);
    }

    public function one(int $id)
    {
        $item = Project::find($id);

        return $item;
    }


    public function remove(int $id)
    {
        $item = Project::find($id);

        if(!$item){
            return false;
        }

        return $item->delete();
    }
}
