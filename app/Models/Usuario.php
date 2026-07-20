<?php

namespace Models;

use Core\Model;
use PDO;

class Usuario extends Model {
    public static function  listarTodos() : array {
        $stmt = parent::pegarBanco()->prepare( 'SELECT u.id, u.nome, u.email, u.ativo, u.criado_em FROM usuarios u');

        $stmt->execute();

        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return [];
        }

        return $usuario;
    }

    public static function  listarCargos() : array {
        $stmt = parent::pegarBanco()->prepare( 'SELECT c.nome, c.descricao FROM cargos c');

        $stmt->execute();

        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return [];
        }

        return $usuario;
    }

    public static function  criarUsuario(array $dados) : int {
        $stmt = parent::pegarBanco()->prepare( 'INSERT INTO usuarios(nome, email, senha_hash, ativo, criado_em) VALUES (:n, :e, :s, :a, c);');

        $stmt->execute();

        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$usuario) {
            return [];
        }

        return $usuario;
    }

    public static function buscaEmail( string $email ) : ?array {
        $stmt = parent::pegarBanco()->prepare( 'SELECT id, nome, senha_hash, email, ativo FROM usuarios WHERE email = :e LIMIT 1' );

        $stmt->execute( [ 'e' => $email ] );

        $usuario = $stmt->fetch();

        if (!$usuario) {
            return null;
        }

        $usuario['cargo'] = self::buscaCargo((int) $usuario['id']);
        $usuario['permissao']= self::buscaPermissao((int) $usuario['id']);

        return $usuario;
    }

    public static function buscaCargo( int $idUsuario ) : array {
        $stmt = parent::pegarBanco()->prepare( ' SELECT cargos.nome FROM cargos INNER JOIN usuario_cargo ON usuario_cargo.cargo_id = cargos.id WHERE usuario_cargo.usuario_id = :usid ORDER BY cargos.nome ' );

        $stmt->execute( [ 'usid' => $idUsuario ]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function buscaPermissao( int $idUsuario ) : array {
        $stmt = parent::pegarBanco()->prepare(
        'SELECT permissoes.nome FROM permissoes
        INNER JOIN cargo_permissao
        ON cargo_permissao.permissao_id = permissoes.id
        INNER JOIN usuario_cargo
        ON usuario_cargo.cargo_id = cargo_permissao.cargo_id
        WHERE usuario_cargo.usuario_id = :usid
        ORDER BY permissoes.nome' );

        $stmt->execute( [ 'usid' => $idUsuario ]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}