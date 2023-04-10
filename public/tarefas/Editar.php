<?php
require_once '../controllerTarefas/listartarefas.php';

$pdo = connectMysql();
$tarefasController = new TarefasController($pdo);
if (!isset($_GET['id'])) {
    header("Location: ../tarefas/tarefas.php");
    exit;
}
$tarefa = $tarefasController->getTarefaPorId($_GET['id']);


?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Tarefa</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2>Editar Tarefa</h2>
                <form action="../controllerTarefas/atualizartarefa.php" method="POST">
                    <input type="hidden" name="taskId" value="<?php echo $tarefa['id']; ?>">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="taskName">Nome da tarefa</label>
                            <input type="text" class="form-control" id="nome_da_tarefa" name="nome_da_tarefa" value="<?php echo $tarefa['nome_da_tarefa']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="startDate">Data de início</label>
                            <input type="date" class="form-control" id="data_de_inicio" name="data_de_inicio" value="<?php echo $tarefa['data_de_inicio']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="deadline">Prazo</label>
                            <input type="date" class="form-control" id="prazo" name="prazo" value="<?php echo $tarefa['prazo']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="priority">Prioridade</label>
                            <select class="form-control" id="prioridade" name="prioridade" required>
                                <option value="baixa" <?php echo $tarefa['prioridade'] == 'baixa' ? 'selected' : ''; ?>>Baixa</option>
                                <option value="media" <?php echo $tarefa['prioridade']== 'media' ? 'selected' : ''; ?>>Média</option>
                                <option value="alta" <?php echo $tarefa['prioridade'] == 'alta' ? 'selected' : ''; ?>>Alta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao"rows="3" required><?php echo $tarefa['descricao']; ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pendente" <?php echo $tarefa['status'] == 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                                <option value="Em progresso" <?php echo $tarefa['status'] == 'Em progresso' ? 'selected' : ''; ?>>Em progresso</option>
                                <option value="Concluído" <?php echo $tarefa['status'] == 'Concluído' ? 'selected' : ''; ?>>Concluído</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="responsavel">Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo $tarefa['responsavel']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <textarea class="form-control" id="observacoes" name="observacoes" rows="3"><?php echo $tarefa['observacoes']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='tarefas.php';">Cancelar</button>
                </form>
            </div>
        </div>

    </div>
    </body>
</html>
