<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function addProject()
    {
        $criterias = [
            'duration' => [
                'Короткий проект' => 'short',
                'Средний' => 'normal',
                'Длинный' => 'long'
            ],

            'technologies' => [
                'frontend' => [
                    'js' => [
                        'AngularJs' => 'angular',
                        'ReactJs' => 'react',
                        'JQuery' => 'jquery',
                    ]
                ],
                'backend' => [
                    'php' => [
                        'Laravel' => 'laravel',
                        'Symfony' => 'symfony',
                        'Yii' => 'yii'
                    ],
                    'node' => [
                        'NestJs' => 'nest',
                        'NextJs' => 'next',
                        'ExpressJs' => 'express',
                    ]
                ]
            ],

            'speed' => [
                'Высокая' => 'fast',
                'Обычная' => 'normal',
                'Низкая' => 'low'
            ],

            'communicative' => [
                'Отсутствует' => 'none',
                'Частичная' => 'part',
                'Полная' => 'fully'
            ]
        ];

        return view('content.add_project', [
            'criterias' => $criterias,
        ]);
    }

    public function choose(Request $request)
    {

    }

    public function one()
    {

    }
}
