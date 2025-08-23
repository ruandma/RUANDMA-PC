<?php
// Inicia a sessão, se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <ul>
        <li><a href="index.php">Início</a></li>
        <li><a href="loja.php">Loja</a></li>
        <li><a href="sobre-nos.php">Sobre Nós</a></li>
        <li><a href="contato.php">Contato</a></li>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <!-- Menu para usuário logado -->
            <li><a href="perfil.php">Meu Perfil</a></li>
            <li><a href="logout.php">Sair</a></li>
        <?php else: ?>
            <!-- Menu para usuário não logado -->
            <li><a href="registrar.php">Registrar</a></li>
            <li><a href="login.php">Entrar</a></li>
        <?php endif; ?>
    </ul>
</nav>
