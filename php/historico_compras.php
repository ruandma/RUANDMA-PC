<?php
session_start();
include "conexao.php";

if(!isset($_SESSION['usuario_id'])){
    header("Location: entrar.php");
    exit;
}

// Aqui você pode buscar as compras no banco, exemplo:
$id_usuario = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT * FROM compras WHERE usuario_id = :id");
$stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<h1>Histórico de Compras</h1>

<?php if(count($compras) === 0): ?>
    <p>Nenhuma compra realizada ainda.</p>
<?php else: ?>
    <ul>
        <?php foreach($compras as $compra): ?>
            <li><?php echo htmlspecialchars($compra['produto']); ?> - R$ <?php echo $compra['valor']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
