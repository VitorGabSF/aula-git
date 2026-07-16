<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/globals.css">
    <title>Estoque</title>
</head>

<body>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . BASE_URL . "app/Views/Componentes/menuSuperior.php" ?>
    <div class="areaEstoque">
        <table class="tabela">
            <thead class="cabecalhoTabela">
                <tr class="linhaTabela">
                    <th class="itemTabela itemCabecalho">Codigo do Item</th>
                    <th class="itemTabela itemCabecalho">Nome do Item</th>
                    <th class="itemTabela itemCabecalho">Quantidade do Item</th>
                    <th class="itemTabela itemCabecalho">Preço do Item</th>
                </tr>
            </thead>
            <tbody class="corpoTabela">
                <tr class="linhaTabela">
                    <td class="itemTabela">1</td>
                    <td class="itemTabela">teste</td>
                    <td class="itemTabela">teste</td>
                    <td class="itemTabela">teste</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>