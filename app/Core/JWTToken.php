<?php

namespace Core;


use RuntimeException;

class JWTToken {
    public static function encode(array $payload, string $segredo) : string {
        if (strlen($segredo) < 32) {
            throw new RuntimeException('Chave menor que 32');
        }

        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];

        $conteudo;
        
        $assinatura = hash_hmac('sha256', $conteudo, $segredo, true);
    }

    public static function decode(string $token, string $segredo) : array
    {
        if (strlen($segredo) < 32)
    } 
}