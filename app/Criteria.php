<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'criteria_vacancy_collections')->withPivot('value');
    }
}
