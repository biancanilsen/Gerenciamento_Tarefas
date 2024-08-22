<?php
include '../config/connection.php';

function getTaskById($id, $tablename) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM $tablename WHERE id = ?");
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    $stmt->close();
}
?>
