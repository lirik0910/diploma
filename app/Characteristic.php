<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'characteristic_worker_collections')->withPivot('value');
    }
}
