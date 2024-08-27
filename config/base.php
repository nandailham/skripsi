<?php


return [
    'sidebar' => [
        'color' => 're',
        'logo' => '/img/logo.jpg',
        'sidebar_name' => 'Toko Natan',
        'sidebar_list' => [
            'dashboard' => [['turunan 1', 'turunan 2'], ['logo'], ['urlnya']]
            //ada kondisi ketika punya turunan apa enggak (sub menu)
            // apabila tidak ada logo sama urlnya maka akan default (admin.dashboard) mengambil ring 0
        ]
    ],
    'footer' => [
        'footer_left' => date('Y-m-d') ?? '',
        'footer_right' => date('Y-m-d') ?? '',
    ]
];
