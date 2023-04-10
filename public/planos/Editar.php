<?php
require_once '../controllerPlanos/listarplanos.php';

$pdo = connectMysql();
$planosController = new PlanosController($pdo);
$plano = $planosController->obterPlanoDeEstudo($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Plano de Estudo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2>Editar Plano de Estudo</h2>
            <form action="../controllerPlanos/atualizarplano.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $plano->id; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="studyPlanName">Nome do Plano de Estudo</label>
                        <input type="text" class="form-control" id="studyPlanName" name="nome_plano" value="<?php echo $plano->nome_plano; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="startDate">Data de Início</label>
                        <input type="date" class="form-control" id="startDate" name="data_inicio" value="<?php echo $plano->data_inicio; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="endDate">Data de Término</label>
                        <input type="date" class="form-control" id="endDate" name="data_termino" value="<?php echo $plano->data_termino; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Em andamento" <?php echo $plano->status == 'Em andamento' ? 'selected' : ''; ?>>Em andamento</option>
                                <option value="Finalizado" <?php echo $plano->status == 'Concluido' ? 'selected' : ''; ?>>Concluido</option>
                                <option value="Cancelado" <?php echo $plano->status == 'Cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="studyGoal">Objetivo de Estudo</label>
                        <input type="text" class="form-control" id="studyGoal" name="objetivo_estudo" value="<?php echo $plano->objetivo_estudo; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="studyResources">Recursos de Estudo</label>
                    <textarea class="form-control" id="studyResources" name="recursos_estudo" rows="3" required><?php echo $plano->recursos_estudo; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="additionalNotes">Notas Adicionais</label>
                    <textarea class="form-control" id="additionalNotes" name="notas_adicionais" rows="3"><?php echo $plano->notas_adicionais; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='planos.php';">Cancelar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
