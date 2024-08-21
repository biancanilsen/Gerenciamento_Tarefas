<?php
// Substituir a lógica aqui pela lógica de busca das tarefas no banco.
$jsonData = file_get_contents('mock-list.json'); 
$tasks = json_decode($jsonData, true);

if (!empty($tasks)) {
    foreach ($tasks as $task) {
        echo '<div class="task">';
        echo '<span class="deadline">' . date("d/m/Y", strtotime($task["deadline"])) . '</span>';
        echo '<p class="description">' . htmlspecialchars($task["description"]) . '</p>';
        echo '<img src="./icons/edit.svg" alt="Editar">';
        echo '<img src="./icons/delete.svg" alt="Excluir">';
        echo '</div>';
    }
} else {
    echo "<p>Nenhuma tarefa encontrada.</p>";
}
?>