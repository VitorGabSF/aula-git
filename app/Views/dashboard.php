<?php

use Core\Auth;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ControlShop</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/globals.css">
</head>
<body>
    <main class="dashboard-card">
        <header class="dashboard-header">
            <div>
                <h1>Dashboard</h1>
                <p>Usuário autenticado pelo JWT.</p>
            </div>

            <form action="<?= BASE_URL ?>logout" method="POST">
                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= htmlspecialchars(Auth::csrfToken(), ENT_QUOTES, 'UTF-8') ?>"
                >
                <button type="submit">Sair</button>
            </form>
        </header>

        <section class="user-data">
            <h2>Dados do usuário</h2>
            <p><strong>ID:</strong> <?= (int) $usuario['id'] ?></p>
            <p><strong>Nome:</strong> <?= htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Cargos:</strong> <?= htmlspecialchars(implode(', ', $usuario['cargo']), ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Permissões:</strong> <?= htmlspecialchars(implode(', ', $usuario['permissao']), ENT_QUOTES, 'UTF-8') ?></p>
        </section>
    </main>
</body>
</html>
