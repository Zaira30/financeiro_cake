<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sistema de Controle Financeiro';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        ul {
            list-style-type: none;
        }

        /* Centralizando o formulário */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Preenche a tela inteira */
            background-color: #f7f7f7;
        }

        .users.form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .users.form h3 {
            text-align: center;
        }

        .users.form fieldset {
            border: none;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilizando o formulário e os filtros */
        .filter-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .filter-container div {
            width: 30%;
        }

        .filter-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .filter-container select,
        .filter-container input[type="date"],
        .filter-container button {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Estilizando a tabela */
        .table-container {
            border: 1px solid #ccc;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js') ?>
</head>
<body>
<?php
// Verifica se a rota atual não é a de login
$current_page = $this->request->getParam('controller') . '/' . $this->request->getParam('action');
if ($current_page !== "Users/login") {  // Ajuste o nome do controller e action de acordo com sua rota de login
    ?>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/movimentations') ?>"><span>Sistema Financeiro</a>
        </div>
        <div class="top-nav-links">
            <!-- Menu de navegação -->
            <ul>
                <li><?= $this->Html->link('Movimentações', ['controller' => 'Movimentations', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link('Usuários', ['controller' => 'Users', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link('Relatórios', ['controller' => 'Movimentations', 'action' => 'report']); ?></li>
                <li><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']); ?></li>
            </ul>
        </div>
    </nav>
<?php } ?>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
</footer>

<script>
    $(document).ready(function() {
        $('#movimentations-table').DataTable({
            "paging": true,  // Paginação
            "searching": true, // Habilita o campo de busca
            "ordering": true,  // Habilita ordenação
            "order": [[ 4, "desc" ]], // Ordena pela coluna de Data (4ª coluna)
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script
</body>
</html>
