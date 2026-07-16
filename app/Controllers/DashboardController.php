<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;

class DashboardController extends Controller{
    public function index() : void {
        $this->view('dashboard/index', [
            'usuario' => Auth::usuario(),
            'sucesso' => Auth::pegarFlash('sucesso')
        ])
    }
}