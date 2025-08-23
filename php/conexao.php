<?php
$host = "localhost";
$user = "root"; // seu usuário do MySQL
$pass = "";     // sua senha do MySQL (se tiver)
$dbname = "ruandma_db"; // o nome do seu banco

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
