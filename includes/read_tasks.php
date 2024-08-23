<ul>
    <?php
    include '../config/connection.php';

    $stmt = $conn->prepare("SELECT * FROM $tablename");
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="task">';
                echo '<span class="deadline">' . date("d/m/Y", strtotime($row["dateTask"])) . '</span>';
                echo '<p class="description">' . htmlspecialchars($row["description"]) . '</p>';
                echo 
                    '<button onclick="openCreateEditModal(' . $row["id"] . ', \'' . htmlspecialchars($row["description"], ENT_QUOTES) . '\', \'' . $row["dateTask"] . '\')" class="edit-icon">
                        <img src="../icons/edit.svg" alt="Editar">
                    </button>';
                echo 
                    '<button onclick="openDeleteModal(' . $row["id"] . ', \'' . htmlspecialchars($row["description"], ENT_QUOTES) . '\')" class="delete-icon">
                        <img src="../icons/delete.svg" alt="Excluir">
                    </button>';
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
