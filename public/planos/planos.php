<?php


session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /login.php');
    exit;
}

require_once '../controllerPlanos/listarplanos.php';
$planosController = new PlanosController($pdo);
$planosEmAndamento = $planosController->planosEmAndamento();
$planosConcluidos = $planosController->buscarPlanosConcluidos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gerenciamento - Planos de Estudo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Voltar</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2>Planos de Estudo</h2>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mr-2" onclick="location.href='../planos/Criar.php';">Criar Plano</button>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>Planos Concluídos</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Plano</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($planosConcluidos as $plano): ?>
                    <tr>
                        <td><?php echo $plano->nome_plano; ?></td>
                        <td><?php echo $plano->status; ?></td>
                        <td class="text-right">
                            <a href="Editar.php?id=<?php echo $plano->id; ?>" class="btn btn-primary">Editar</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="if (confirm('Tem certeza que deseja deletar?')) { location.href='../controllerPlanos/deletarplano.php?id=<?php echo $plano->id; ?>'; }">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h4>Planos em Andamento</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Plano</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Ações</</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($planosEmAndamento as $plano): ?>
                    <tr>
                        <td><?php echo $plano->nome_plano; ?></td>
                        <td><?php echo $plano->status; ?></td>
                        <td class="text-right">
                            <a href="Editar.php?id=<?php echo $plano->id; ?>" class="btn btn-primary">Editar</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="if (confirm('Tem certeza que deseja deletar?')) { location.href='../controllerPlanos/deletarplano.php?id=<?php echo $plano->id; ?>'; }">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
