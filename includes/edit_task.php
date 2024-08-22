<?php
include '../config/connection.php';
include 'get_task.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task = getTaskById($conn, $id, $tablename);

    if ($task === null) {
        die("Tarefa não encontrada.");
    }
}

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
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao editar tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="edit_task.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <div>
            <label for="form-description">Descrição</label>
            <input type="text" name="form-description" id="form-description" value="<?php echo htmlspecialchars($task['description']); ?>">
        </div>
        <div>
            <label for="form-deadline">Data de Conclusão</label>
            <input type="date" name="form-deadline" id="form-deadline" value="<?php echo $task['dateTask']; ?>">
        </div>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
