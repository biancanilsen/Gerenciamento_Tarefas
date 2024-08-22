<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "taskManager";
$tablename = "task";

// Conectar ao MySQL
$conn = new mysqli($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Criar banco de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar banco de dados: " . $conn->error);
}

// Conectar ao banco de dados
$conn->select_db($dbname);

// Criar tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS $tablename (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    dateTask DATE NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Erro ao criar tabela: " . $conn->error);
}
?>
