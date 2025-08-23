<?php
// Inicia a sessão
session_start();

// Remove todas as variáveis da sessão
$_SESSION = [];

// Destrói a sessão
session_destroy();

// Redireciona para a página inicial correta
header("Location: /RUANDMA-PC/index.php");
exit;
?>
