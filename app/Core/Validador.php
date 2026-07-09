<?php

namespace Core;

class Validador {
    public static function required(?string $valor) : bool {
        return trim((string) $valor) !== '';
    }

    public static function email(?string $valor) : bool {
        return filter_var($valor, FILTER_VALIDATE_EMAIL) !== false;
    }
}