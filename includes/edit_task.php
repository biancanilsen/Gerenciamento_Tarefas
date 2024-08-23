<?php
include '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $description = $_POST['form-description'];
    $dateTask = $_POST['form-deadline'];

    $stmt = $conn->prepare("UPDATE $tablename SET description = ?, dateTask = ? WHERE id = ?");
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssi", $description, $dateTask, $id);

    if ($stmt->execute()) {
        header("Location: ../public/index.php");
        exit();
    } else {
        echo "Erro ao editar tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
