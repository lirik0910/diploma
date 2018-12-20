<?php

use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ProjectStatus::create([
            'title' => 'Формирование команды'
        ]);

        App\ProjectStatus::create([
            'title' => 'В разработке'
        ]);

        App\ProjectStatus::create([
            'title' => 'Завершен'
        ]);
    }
}
