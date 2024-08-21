<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="page-title">Gerenciador de Tarefas</h1>
    <button onclick="openModal()">Criar Nova Tarefa</button>

    <form id="modal" class="modal hidden">
        <div>
            <label for="form-description">Descrição </label>
            <input type="text" name="form-description">
        </div>
        <div>
            <label for="form-deadline">Data de Conclusão </label>
            <input type="date" name="form-deadline" id="form-deadline">
        </div>

        <div class="modal-buttons">
            <button type="button" onclick="closeModal()">Fechar</button>
            <button>Criar</button>
        </div>
    </form>

    <div class="task-list">
        <?php include 'get_tasks.php'; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>