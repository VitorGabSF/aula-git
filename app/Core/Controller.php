<?php

namespace Core;

class Controller{
<<<<<<< HEAD
    public function view(string $name, array $data = []) : void{
        extract($data);
        $viewFile = __DIR__.'/../Views/' . $name . '.php';
        if (!file_exists($viewFile)){
            http_response_code(404);
            exit('Página não existe!');
        
            
=======
    public function view(string $name, array $data = []) : void {
        extract($data);

        $viewFile = __DIR__ . '/../Views/' . $name . '.php';

        if (!file_exists($viewFile)) {
            http_response_code(404);
            exit('Página não existe');
>>>>>>> 50d1407df68b73d2a3095849c0eecba70e4d2566
        }

        require $viewFile;
    }

<<<<<<< HEAD
    public function redirecionar(string $caminho) : void{
        header('location: ' . BASE_URL . ltrim($caminho, '/'));
=======
    public function redirecionar(string $caminho) : void {
        header('Location: ' . BASE_URL . ltrim($caminho, '/'));
>>>>>>> 50d1407df68b73d2a3095849c0eecba70e4d2566
        exit;
    }
}