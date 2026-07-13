<?php

namespace Core;

class Validador {
    public static function required(?string $valor) : bool {
        return trim((string) $valor) !== '';
    }

    public static function email(?string $valor) : bool {
        return filter_var($valor, FILTER_VALIDATE_EMAIL) !== false;
    }
    public static function cpf(?string $valor) : bool{
        $cpfLimpo = str_replace(".","",$valor);
        [$novePrimeiros ,$doisUltimos] = explode("-",$cpfLimpo);
        $numeroUnico = count_chars($novePrimeiros, 1);
        if(count($numeroUnico) === 1 ){
            exit("CPF inválido");
        }
        (int) $multiplicador = 10;
        $total = 0;
        foreach(str_split($novePrimeiros) as  $num){
            (int) $total += $multiplicador * (int) $num;
            $multiplicador -= 1;   
        }
        $total = $total % 11;
        $primeiroVerificador = $total < 2 ? 0 : 11 - $total;

        $total = 0;
        $multiplicador = 11;
        foreach(str_split($novePrimeiros) as  $num){
            (int) $total += $multiplicador * (int) $num;
            $multiplicador -= 1;
        }
        $total += $multiplicador * (int) $primeiroVerificador;
        $total = $total % 11;
        $segundoVerificador = $total < 2 ? 0 : 11 - $total;
        if((int) $doisUltimos[0] !== $primeiroVerificador && (int) $doisUltimos[1] !== $segundoVerificador){
            exit('CPF invalido');
        }
        return true;


    }
}
