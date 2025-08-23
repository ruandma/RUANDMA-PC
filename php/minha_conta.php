<?php
session_start();
include "conexao.php";

if(!isset($_SESSION['usuario_id'])){
    header("Location: entrar.php");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
$stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$usuario){
    die("Usuário não encontrado.");
}
?>

<?php include 'header.php'; ?>

<h1>Minha Conta</h1>
<p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
<p><strong>WhatsApp:</strong> <?php echo htmlspecialchars($usuario['whatsapp']); ?></p>
