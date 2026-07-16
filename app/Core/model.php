<?php

namespace Core;

use PDO;

abstract class Model{
    public static function pegarBanco(): PDO {
        return Database::conectar();
    }
}