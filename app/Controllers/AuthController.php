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
            'erro'    => Auth::pegarflash('erro')
            'sucesso' => Auth::pegarflash('sucesso')
        ]);
    }
}