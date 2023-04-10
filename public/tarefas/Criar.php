<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Tarefas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2>Cadastro de Tarefas</h2>
            <form action="../controllerTarefas/criartarefa.php" method="POST">
            <form id="taskForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="taskName">Nome da tarefa</label>
                        <input type="text" class="form-control" id="taskName" name="taskName" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="startDate">Data de início</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="deadline">Prazo</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priority">Prioridade</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="">Selecione a prioridade</option>
                            <option value="baixa">Baixa</option>
                            <option value="media">Média</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Selecione o status</option>
                            <option value="pendente">Pendente</option>
                            <option value="Em progresso">Em progresso</option>
                            <option value="concluido">Concluído</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="responsible">Responsável</label>
                        <input type="text" class="form-control" id="responsible" name="responsible" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="observations">Observações</label>
                        <textarea class="form-control" id="observations" name="observations" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {

        $('#taskForm').on('submit', function (event) {
            event.preventDefault(); // Impede o envio do formulário e o recarregamento da página

            const formData = $(this).serializeArray();
            const taskData = {};

            for (const field of formData) {
                taskData[field.name] = field.value.trim();
            }

            if (validateTaskData(taskData)) {
                console.log("Tarefa cadastrada:", taskData);
                // Você pode personalizar a ação a ser executada ao cadastrar uma tarefa aqui
            } else {
                alert("Por favor, preencha todos os campos obrigatórios.");
            }
        });
    });

    function validateTaskData(taskData) {
        // Verifique se todos os campos obrigatórios estão preenchidos
        return Object.values(taskData).every((value) => value !== "");
    }
</script>
</body>

</html>

