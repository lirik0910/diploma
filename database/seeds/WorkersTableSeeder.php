<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Worker::create([
            'name' => 'Алексей Воевода',
            'age' => '23',
        ]);

        App\Worker::create([
            'name' => 'Николай Кузнецов',
            'age' => '28',
        ]);

        App\Worker::create([
            'name' => 'Руслан Крылов',
            'age' => '34',
        ]);

        App\Worker::create([
            'name' => 'Анна Сташевская',
            'age' => '21',
        ]);

        App\Worker::create([
            'name' => 'Михаил Нигматулин',
            'age' => '29',
        ]);

        App\Worker::create([
            'name' => 'Полина Кузнецова',
            'age' => '32',
        ]);
    }
}
