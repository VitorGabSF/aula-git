<?php

if (PHP_SAPI !== 'cli') {
    exit("Execute este arquivo pelo terminal.\n");
}

spl_autoload_register(function ($class) {
    $file = dirname(__DIR__) . '/app/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

use Core\Database;
use Core\HashSenha;

$nome = $argv[1] ?? 'Administrador';
$email = $argv[2] ?? 'admin@controlshop.com';
$senha = $argv[3] ?? 'Admin@123';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("E-mail inválido.\n");
}

if (strlen($senha) < 8) {
    exit("A senha deve possuir pelo menos 8 caracteres.\n");
}

$db = Database::conectar();

try {
    $db->beginTransaction();

    $stmt = $db->prepare(
        'INSERT INTO usuarios (nome, email, senha_hash)
         VALUES (:nome, :email, :senha_hash)'
    );

    $stmt->execute([
        'nome' => $nome,
        'email' => $email,
        'senha_hash' => HashSenha::criar($senha),
    ]);

    $usuarioId = (int) $db->lastInsertId();

    $stmt = $db->prepare(
        'INSERT INTO usuario_cargo (usuario_id, cargo_id)
         SELECT :usuario_id, id FROM cargos WHERE nome = :cargo'
    );

    $stmt->execute([
        'usuario_id' => $usuarioId,
        'cargo' => 'ADMIN',
    ]);

    $db->commit();
    echo "Administrador criado com sucesso.\n";
} catch (Throwable $erro) {
    if ($db->inTransaction()) {
        $db->rollBack();
    }

    exit("Não foi possível criar o administrador: {$erro->getMessage()}\n");
}
