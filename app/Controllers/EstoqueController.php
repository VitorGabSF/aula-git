<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;

class EstoqueController extends Controller {
    public function index() : void {
        $this->view('/estoque', [
            'usuario' => Auth::usuario(),
            'sucesso' => Auth::pegarFlash('sucesso')
        ]);
    }
}