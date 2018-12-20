<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Project::create([
            'name' => 'Mofy.life',
            'description' => 'Cервис создания инстабуков.',
            'status_id' => 3,
        ]);

        App\Project::create([
            'name' => 'Greenlight',
            'description' => 'Сервис сток для продажи фотографий в цифровом и печатном виде.',
            'status_id' => 1,
        ]);
    }
}
