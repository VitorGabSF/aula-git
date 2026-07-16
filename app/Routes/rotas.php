<?php

$rotas->add('GET', '/', 'AuthController@loginForm');
$rotas->add('GET', '/login', 'AuthController@loginForm');
$rotas->add('POST', '/login', 'AuthController@login');
$rotas->add('GET', '/dashboard', 'DashboardController@index');
$rotas->add('POST', '/logout', 'AuthController@logout');