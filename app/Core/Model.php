<?php

namespace Core;

use PDO;

class Model {
    public static function pegarBanco(): PDO{
        return Database::conectar();
    }
}