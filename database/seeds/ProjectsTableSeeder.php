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
        //

        App\Projects::create([
            'name' => 'Mofy.life',
            'duration' => 'long',
            'technologies' => 'frontend.js.angular;backend.php.laravel',
            'communicative' => 0.6,
            'speed' => 0.64,
            'priorities' => '8,6,5,10',
        ]);

        App\Projects::create([
            'name' => 'Greenlight',
            'duration' => 'normal',
            'technologies' => 'frontend.js.react;backend.php.codeigniter',
            'communicative' => 0.6,
            'speed' => 0.64,
            'priorities' => '9,7,7,6',
        ]);
    }
}
