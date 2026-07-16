<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;
use Core\Validador;
use Core\HashSenha;
use Models\Usuario;

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
        
        if (!Validador::required($email) || !Validador::required($senha)) {
            Auth::flash('erro', 'Manda email e senha');
            $this->redirecionar('/login');
        }

        if (!Validador::email($email)) {
            Auth::flash('erro', 'Email inválido');
            $this->redirecionar('/login');
        }

        $usuario = Usuario::buscaEmail($email);

        if (!$usuario || !$usuario['ativo'] || !HashSenha::verificar($senha, $usuario['senha_hash'])) {
            Auth::flash('erro', 'Email ou senha inválidos');
            $this->redirecionar('/login');
        }

        Auth::login($usuario);
        Auth::flash('sucesso', 'login com sucesso');
        $this->redirecionar('/dashboard');
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