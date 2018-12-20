<?php

use Illuminate\Database\Seeder;

class CharacteristicWorkerCollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workers = App\Worker::all();
        $characteristics = App\Characteristic::all();

        $periods = [
            'short',
            'normal',
            'long'
        ];

        $i = 1;
        foreach ($workers as $worker){
            foreach ($characteristics as $char){
                $val = '';

                if($char->title === 'technologies'){
                    if($i === 1){
                        $val = 'ReactJs, MODx, Apache, MySql';
                    } elseif ($i === 2){
                        $val = 'AngularJs, ReactJs, JQuery, Yii, Nginx';
                    } elseif ($i === 3){
                        $val = 'Symphony, MODx, AngularJs, Laravel';
                    } elseif ($i === 4){
                        $val = 'Symphony, MODx, AngularJs, Laravel, Nginx';
                    } elseif ($i === 5){
                        $val = 'Symphony, Wordpress, MODx, Laravel';
                    } elseif($i === 6){
                        $val = 'MODx, Apache, JQuery';
                    } elseif ($i === 7){
                        $val = 'Symphony, MODx, AngularJs, ReactJs';
                    }

                    App\CharacteristicWorkerCollection::create([
                        'worker_id' => $worker->id,
                        'characteristic_id' => $char->id,
                        'value' => $val
                    ]);
                } elseif ($char->title === 'communicative'){
                    $val = rand(1, 10);

                    App\CharacteristicWorkerCollection::create([
                        'worker_id' => $worker->id,
                        'characteristic_id' => $char->id,
                        'value' => $val
                    ]);
                } elseif ($char->title === 'period'){
                    $val = array_rand($periods);

                    App\CharacteristicWorkerCollection::create([
                        'worker_id' => $worker->id,
                        'characteristic_id' => $char->id,
                        'value' => $periods[$val]
                    ]);
                } elseif ($char->title === 'terms'){
                    $val = rand(1, 10);

                    App\CharacteristicWorkerCollection::create([
                        'worker_id' => $worker->id,
                        'characteristic_id' => $char->id,
                        'value' => $val
                    ]);
                }
            }
            $i++;
        }


    }
}
