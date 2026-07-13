<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;

class AuthController extends Controller {

    public function loginForm() : void {
        if (Auth::checar()) {
            $this->redirecionar('/dashboard');
        }

        $this->view('/login', [
            'erro'      => Auth::pegarFlash('erro'),
            'sucesso'   => Auth::pegarFlash('sucesso')
        ]);
    }

    public function login() : void {
        if (!Auth::validarCsrf($_POST['csrf_token'] ?? null)) {
            http_response_code(419);
            exit('CSRF inválido');
        }

        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        
        echo $email . " - " . $senha;
    }

    public function logout() : void {
        Auth::requerLogin();

        if (!Auth::validarCsrf($_POST['csrf_token'] ?? null)) {
            http_response_code(419);
            exit('CSRF inválido');
        }

        Auth::logout();
        Auth::flash('sucesso', 'logout realizado');
        $this->redirecionar('/login');
    }
}