<?php

include '../config/connection.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['form-description']; 
    $dateTask = $_POST['form-deadline'];

    // Inserção de tarefa
    $stmt = $conn->prepare("INSERT INTO $tablename (description, dateTask) VALUES (?, ?)");
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $description, $dateTask);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
