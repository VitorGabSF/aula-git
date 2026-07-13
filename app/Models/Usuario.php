<?php

namespace models;

use core\Model;
use PDO;

class Usuario extends Model {
    public static function buscarEmail(string $email) : array{
        $stmt = parent::pegarBanco()->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = :e LIMIT 1');
        $stmt->execute(['e' => $email]);

        $usuario = $stmt->fetch();

        if (!$usuario) {
            return null;
        }

        $usuario['cargo'];
        $usuario['permissao'];
    }

    public static function buscarCargo( int $idUsuario) : array {
        $stmt = parent::pegarBanco()->prepare('SELECT cargos.nome FROM cargos INNER JOIN usuario_cargo ON usuario_cargo.cargo_id = cargo.id WHERE usuario_cargo.usuario_id = :usid ORDER BY cargo.nome ');
        $stmt->execute(['usid' => $idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}