<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriteriaVacancyCollection extends Model
{
    protected $table = 'criteria_vacancy_collections';
    protected $fillable = ['criteria_id', 'vacancy_id', 'value'];

}
