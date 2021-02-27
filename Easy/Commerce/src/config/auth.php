<?php
return [
    'guards' => [
        'admin' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => Easy\Commerce\Models\User\Admin::class,
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 10,
        ],
    ],
];