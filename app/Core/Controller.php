<?php

namespace Core;

class Controller{
    public function view(string $name, array $data = []) : void{
        extract($data);
        $viewFile = __DIR__.'/../Views/' . $name . '.php';
        if (!file_exists($viewFile)){
            http_response_code(404);
            exit('Página não existe!');
        
            
        }

        require $viewFile;
    }

    public function redirecionar(string $caminho) : void{
        header('location: ' . BASE_URL . ltrim($caminho, '/'));
        exit;
    }
}