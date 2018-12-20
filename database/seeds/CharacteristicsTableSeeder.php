<?php

use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Characteristic::create([
            'title' => 'technologies',
            'subtitle' => 'Технологии',
            'description' => 'Технологии, которыми владеет кандидат',
            'type' => 'string'
        ]);

        App\Characteristic::create([
            'title' => 'communicative',
            'subtitle' => 'Коммуникативные навыки',
            'description' => 'Уровень коммуникативных навыков кандидата',
            'type' => 'string'
        ]);

        App\Characteristic::create([
            'title' => 'period',
            'subtitle' => 'Длительность работы',
            'description' => 'Желаемая длительность проекта',
            'type' => 'string'
        ]);

        App\Characteristic::create([
            'title' => 'terms',
            'subtitle' => 'Скорость',
            'description' => 'Скорость выполнения тестового задания',
            'type' => 'string'
        ]);
    }
}
