<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'characteristic_worker_collections')->withPivot('value');
    }
}
