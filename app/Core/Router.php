<?php

namespace Core;

class Router {
    public array $rotas = [];

    public function add( string $metodo, string $uri, string $controller, string $permissao) : void {
        $this->rotas[] = [
            'metodo' => strtoupper($metodo),
            'uri' => $uri,
            'controller' => $controller,
            'permissao' => $permissao
        ];
    }
    public function dispatch() : void{
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

        $caminhoBase = rtrim(BASE_URL, '/');

        if($caminhoBase !== '' && str_starts_with($uri, $caminhoBase)) {
            $uri = substr($uri, strlen($caminhoBase));
        }
        $uri = $uri === '' ? '/' : $uri;

        $metodo = strtoupper($_SERVER ['REQUEST_METHOD']);

        foreach ($this->rotas as $rota){
            if($rota['metodo'] !== $metodo || $rota ['uri'] !== $uri) {
                continue;
            }

            if( $rota['permissao'] !== null ){
                exit;
            }

            [$controllerNome, $metodoNome] = explode('@', $rota['controller'], 2);

            $controllerClass = 'Controller\\' . $controllerNome;

            if (!class_exists($controllerClass)) {
                http_response_code(500);
                exit('Não tem essa controller');
            }
            $controller = new $controllerClass();

            if(!method_exists($controller, $metodoNome)){
                http_response_code(500);
                exit('Não tem esse método');
            }
            $controller->$metodoNome();
            return;
        }
        http_response_code(404);
        echo 'sem página irmão';
    }
}