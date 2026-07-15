<?php

return [
    'app_name' => 'ControlShop',
    'base_folder' => '/aula-git/',
    'db' => [
        'host'      => 'localhost',
        'dbname'    => 'controlshop',
        'user'      => 'root',
        'password'  => ''
    ],
    'jwt' => [
        'secret'        => 'chave-jwt',
        'ttl'           => 1800,
        'cookie_name'   => 'controlshop',
        'cookie_secure' => false
    ]
];