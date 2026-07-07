<?php
namespace Core;

use PDO;
use Database;

class Model{
    public static function pegarBanco(): PDO {
        return Database::conectar();
    }
}