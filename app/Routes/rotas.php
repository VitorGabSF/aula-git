<?php

$rotas->add('GET', '/', 'AuthController@loginForm');
$rotas->add('GET', '/login', 'AuthController@loginForm');
$rotas->add('POST', '/login', 'AuthController@login');
$rotas->add('POST', '/logout', 'AuthController@logout');
