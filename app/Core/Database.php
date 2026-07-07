<?php
namespace Core;

use PDO;
use PDOException;

class Database{
    private static ?PDO $conexao = null;
    public static function conctar(): PDO{
        $config  = require __DIR__.'/../../config/config.php';
        $db = $config['db'];
    
        $dsn = "mysql:host={$db['host']};"."dbname={$db['dbname']}; charset=utf8mb4";
        try{
            self::$conexao = new PDO( $dsn, $db['user'], $db['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
        }catch(PDOException $excecao) {
            error_log($excecao->getMessage());
        }
        return self::$conexao;
    }
}