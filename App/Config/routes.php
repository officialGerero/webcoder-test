<?php

return [
    '' => [
        'controller'=>'main',
        'action'=>'index',
    ],

    'deps' => [
        'controller'=>'department',
        'action'=>'get',
    ],

    'user/new' => [
        'controller'=>'user',
        'action'=>'add',
    ],

    'users' => [
        'controller'=>'user',
        'action'=>'get',
    ],
];