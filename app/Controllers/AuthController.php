<?php

namespace Controller;

use Core\Auth;
use Core\Controller;

class AuthController extends Controller {
    public function loginForm() : void {
        if (Auth::checar()) {
            $this->redirecionar('/dashboard');
        }

        $this->view('auth/login', [
            'erro' => Auth::pegarFlah('erro'),
            'sucesso' => Auth::pegarFlash('sucesso')
        ]);
    }

    public function login() : void {
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        if (!Auth::validarCsrf($_POST['csrf_token'] ?? null)) {
            http_response_code(419);
            exit('CSRF inválido');
        }

        if ($email === '' || $senha === ''){
            Auth::flash('erro', 'informe um email válido');
            $this->redirecionar('/login');
        }
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