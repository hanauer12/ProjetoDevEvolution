<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Plano de Estudo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2>Criar Plano de Estudo</h2>
            <form action="../controllerPlanos/criarplano.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="studyPlanName">Nome do Plano de Estudo</label>
                        <input type="text" class="form-control" id="studyPlanName" name="nome_plano" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="startDate">Data de Início</label>
                        <input type="date" class="form-control" id="startDate" name="data_inicio" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="endDate">Data de Término</label>
                        <input type="date" class="form-control" id="endDate" name="data_termino" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="studyGoal">Objetivo de Estudo</label>
                        <input type="text" class="form-control" id="studyGoal" name="objetivo_estudo" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Em Andamento">Em Andamento</option>
                            <option value="Concluído">Concluído</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="studyResources">Recursos de Estudo</label>
                    <textarea class="form-control" id="studyResources" name="recursos_estudo" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="additionalNotes">Notas Adicionais</label>
                    <textarea class="form-control" id="additionalNotes" name="notas_adicionais" rows="3"></textarea>
                </div>
                <button type="submit"
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='planos.php';">Cancelar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
