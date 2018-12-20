<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_statuses';
    protected $fillable = ['title'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
