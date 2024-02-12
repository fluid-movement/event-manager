<?php

use Based\TypeScript\Generators\ModelGenerator;
use Illuminate\Database\Eloquent\Model;

return [
    'generators' => [
        Model::class => ModelGenerator::class,
    ],

    'paths' => [],

    'customRules' => [],

    'output' => resource_path('js/types/index.d.ts'),

    'autoloadDev' => false,
];
