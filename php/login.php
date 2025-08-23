<?php
session_start();
include "conexao.php"; // conexão PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe e limpa os dados
    $login = isset($_POST['login']) ? trim($_POST['login']) : '';
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

    // Valida campos vazios
    if (empty($login) || empty($senha)) {
        $_SESSION['erro_login'] = "Preencha todos os campos.";
        header("Location: ../php/entrar.php");
        exit;
    }

    try {
        // Consulta usuário por email ou WhatsApp
        $sql = "SELECT * FROM usuarios WHERE email = :login OR whatsapp = :login LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            $_SESSION['erro_login'] = "Usuário não encontrado.";
            header("Location: ../php/entrar.php");
            exit;
        }

        // Verifica senha
        if (!password_verify($senha, $usuario['senha'])) {
            $_SESSION['erro_login'] = "Senha incorreta.";
            header("Location: ../php/entrar.php");
            exit;
        }

        // Login bem-sucedido → cria sessão
        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['sucesso_login'] = "Login realizado com sucesso!";
        header("Location: ../index.php");
        exit;

    } catch (PDOException $e) {
        $_SESSION['erro_login'] = "Erro interno no sistema. Tente novamente.";
        // error_log($e->getMessage()); // Descomente para debug
        header("Location: ../php/entrar.php");
        exit;
    }

} else {
    // Acesso direto via URL → redireciona para login
    header("Location: ../php/entrar.php");
    exit;
}
?>
