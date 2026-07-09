<<<<<<< HEAD
<?php 
session_start();

spl_autoload_register(function ($class) {
    $file = __DIR__.'/app/' . str_replace('\\', '/', $class). '.php';

    if (file_exists($file)){
=======
<?php

session_start();

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/app/' . str_replace('\\', '/', $class) . '.php';

    if( file_exists($file)) {
>>>>>>> 50d1407df68b73d2a3095849c0eecba70e4d2566
        require $file;
    }
});

$config = require __DIR__.'/config/config.php';

<<<<<<< HEAD
define('BASE_URL', $config['base_folder']);
=======
define('BASE_URL', $config['base_folder']);

>>>>>>> 50d1407df68b73d2a3095849c0eecba70e4d2566
