<?php
session_start();
?>

<link rel="stylesheet" href="css/style.css">

<nav class="menu">
    <ul>
        <li><a href="index.php">Início</a></li>
        <?php if(isset($_SESSION['usuario_id'])): ?>
            <li><a href="minha_conta.php">Minha Conta</a></li>
            <li><a href="historico_compras.php">Histórico de Compras</a></li>
            <li><a href="logout.php">Sair</a></li>
        <?php else: ?>
            <li><a href="entrar.php">Entrar</a></li>
            <li><a href="registrar.php">Registrar</a></li>
        <?php endif; ?>
    </ul>
</nav>
