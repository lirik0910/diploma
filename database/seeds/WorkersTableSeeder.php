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
        App\Workers::create([
            'name' => 'Vasyl Kkk',
            'duration' => 'long',
            'technologies' => 'frontend.js;backend.php.laravel',
            'communicative' => 0.7,
            'speed' => 0.64,
        ]);

        App\Workers::create([
            'name' => 'Michail',
            'duration' => 'short',
            'technologies' => 'frontend.js.angular;backend.php',
            'communicative' => 0.6,
            'speed' => 0.72,
        ]);

        App\Workers::create([
            'name' => 'Petro',
            'duration' => 'normal',
            'technologies' => 'backend.php.codeigniter',
            'communicative' => 0.9,
            'speed' => 0.31,
        ]);

        App\Workers::create([
            'name' => 'Yana',
            'duration' => 'long',
            'technologies' => 'frontend.js.angular_react',
            'communicative' => 0.8,
            'speed' => 0.54,
        ]);

        App\Workers::create([
            'name' => 'Diana',
            'duration' => 'normal',
            'technologies' => 'frontend.js.angular;backend.php,laravel',
            'communicative' => 0.7,
            'speed' => 0.78,
        ]);
    }
}
