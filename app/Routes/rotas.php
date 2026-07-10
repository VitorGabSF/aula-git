<?php

$rotas->add('GET', '/login', 'AuthController@login');
$rotas->add('POST', '/login', 'AuthController@login');
$rotas->add('POST', '/logout', 'AuthController@logout');