<?php
include '../config/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM $tablename WHERE id = ?");
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../public/index.php");
        exit();
    } else {
        echo "Erro ao deletar tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
