<?php

namespace Core;

class Router
{
    public array $rotas = [];

    public function add(string $metodo, string $uri, string $controller, ?string $permissao = null): void
    {

        $this->rotas[] = [
            'metodo'     => strtoupper($metodo),
            'uri'        => $uri,
            'controller' => $controller,
            'permissao'  => $permissao
        ];
    }

    public function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

        $caminhoBase = rtrim(BASE_URL, '/');

        if($caminhoBase !== '' && str_starts_with($uri, $caminhoBase)) {
            $uri = substr($uri, strlen($caminhoBase));
        }

        $uri = $uri === '' ? '/' : $uri;

        $metodo = strtoupper($_SERVER['REQUEST_METHOD']);

        foreach ($this->rotas as $rota) {
            if ($rota['metodo'] !== $metodo || $rota['uri'] !== $uri) {
                continue;
            }
        }
    }
}
