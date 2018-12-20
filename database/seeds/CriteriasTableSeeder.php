<?php

use Illuminate\Database\Seeder;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Criteria::create([
            'title' => 'technologies',
            'subtitle' => 'Технологии',
            'description' => 'Технологии, необходимые для этой вакансии',
            'type' => 'string'
        ]);

        App\Criteria::create([
            'title' => 'communicative',
            'subtitle' => 'Обеспечение коммуникации',
            'description' => 'Обеспечение коммуникации менеджером внутри команды',
            'type' => 'string'
        ]);

        App\Criteria::create([
            'title' => 'period',
            'subtitle' => 'Длительность работы',
            'description' => 'Величина периода, в течении которого необходим кандидат',
            'type' => 'string'
        ]);

        App\Criteria::create([
            'title' => 'terms',
            'subtitle' => 'Срочность',
            'description' => 'Срочность, с которой необходимо выполнить работу',
            'type' => 'string'
        ]);
    }
}
