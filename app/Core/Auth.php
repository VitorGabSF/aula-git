<?php

namespace Core;

class Auth {
    public static function login( array $usuario ) : void {
        session_start();
        session_regenerate_id(true);

        $_SESSION['usuario_autenticado'] = [
            'id'        => (int) $usuario['id'],
            'nome'      => $usuario['nome'],
            'email'     => $usuario['email'],
            'cargo'     => $usuario['cargo'],
            'permissao' => $usuario['permissao'] ?? []
        ];
    }

    public static function usuario() : ?array {
        return $_SESSION['usuario_autenticado'] ?? null;
    }

    public static function id(): ?int {
        return isset($_SESSION['usuario_autenticado']['id']) ? (int) $_SESSION['usuario_autenticado']['id'] : null;
    }

    public static function checar() : bool {
        return isset($_SESSION['usuario_autenticado']);
    }

    public static function convidado() : bool {
        return !self::checar();
    }

    public static function pode(string $permissao) : bool {
        if (!self::checar()) {
            return false;
        }

        return in_array(
            $permissao,
            $_SESSION['usuario_autenticado']['permissao'] ?? [],
            true
        );
    }

    public static function temCargo(string $cargo) : bool {
        return self::checar() && in_array(
            $cargo,
            $_SESSION['usuario_autenticado']['cargo'] ?? [],
            true
        );
    }

    public static function requerLogin() : void {
        if(!self::checar()) {
            self::flash('erro', 'Faz login ae');
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }

    public static function requerPermissao(string $permissao) : void {
        self::requerLogin();

        if(!self::pode($permissao)) {
            header('Location: ' . BASE_URL . '403');
            exit;
        }
    }

    public static function logout() : void {
        $_SESSION = [];
        session_regenerate_id(true);
        session_destroy();
    }

    
}