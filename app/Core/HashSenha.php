<?php 

namespace Core;

class HashSenha{
    private const ITERACOES = 210000;

    public static function criar(string $str) : string {
        $salt = bin2hex(random_bytes(16));

        $hash = hash_pbkdf2(
            'sha256',
            $senha,
            $salt,
            self::ITERACOES,
            64
        );

        return self::ITERACOES . '$' . $salt . '$' . $hash;
    }
    
    public static function verificar(string $senha, string $hashSalvo) : bool {
        $partees = explode('$', $hashSalvo);

        if (count($partes) !== 3) {
            return false;
        }

        [
            $iteracoes,
            $salt,
            $hashEsperado
        ] = $partes;
    }
}