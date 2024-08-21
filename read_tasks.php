<ul>
    <?php
    include 'connection.php';

    $stmt = $conn->prepare("SELECT * FROM $tablename");
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="task">';
                echo '<span class="deadline">' . date("d/m/Y", strtotime($row["dateTask"])) . '</span>';
                echo '<p class="description">' . htmlspecialchars($row["description"]) . '</p>';
                echo '<img src="./icons/edit.svg" alt="Editar">';
                echo '<img src="./icons/delete.svg" alt="Excluir">';
                echo '</div>';
            }
        } else {
            echo "<p>Nenhuma tarefa encontrada.</p>";
        }
    } else {
        echo "Erro ao executar consulta: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    ?>
</ul>
