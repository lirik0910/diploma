<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = ['name', 'project_id', 'status', 'worker_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }

    public function criterias()
    {
        return $this->belongsToMany(Criteria::class, 'criteria_vacancy_collections')->withPivot('value');
    }
}
