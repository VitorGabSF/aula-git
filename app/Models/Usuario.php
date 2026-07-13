<?php

namespace Models;

use Core\Models;
use PDO;

class Usuario extends Model {
    public static function buscarEmail(string $email ) : array {
        $stmt = parent::pegarBanco()->prepare('SELECT id, nome, cargo, permissao, email, ativo, FROM  usuarios WHERE email = :e LIMIT 1');

        $smtm->execute(['e' => $email]);

        $usuario = $smtm->fetch();

        if (!$usuario) {
            return null;

        }
        $usuario['cargo'];
        $usuario['permissao'];

        return $usuario;
    
    }

    public static function buscaCargo(int $idUsuario) : array {
        $stmt = parent :: pegarbanco()->prepare('SELECT cargos.nome FROM cargos INNER JOIN usuario_cargos ON usuario_cargo.cargos_id = cargo.id WHERE usuario_cargo.usuario_id = : usid ORDER BY cargo.nome ' );

        $stmt->execute(['usuario_id' => $idUsuario ]);
            return $stmt-fetchAll(PDO::FETCH_COLUMN);

    }

    public static function buscaCargo(int $idUsuario) : array {
        $stmt = parent :: pegarbanco()->prepare('SELECT permissoes.nome FROM permissoes INNER JOIN cargo_permissao ON cargo_permissao.cargos_id = permissao.id INNER JOIN usuario_cargo ON usuario_cargo.cargo_id = cargo_permissao.cargo_id WHERE usuario_cargo.usuario_id = : usid ORDER BY cargo.nome ORDER BY permissoes.nome' );

        $stmt->execute(['usuario_id' => $idUsuario ]);
            return $stmt-fetchAll(PDO::FETCH_COLUMN);

    }
}

