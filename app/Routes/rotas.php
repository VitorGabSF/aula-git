<?php

$rotas->add('GET', '/login', 'AuthController@login');
$rotas->add('POST', '/login', 'AuthController@login');
$rotas->add('post', '/logout', 'AuthController@login');