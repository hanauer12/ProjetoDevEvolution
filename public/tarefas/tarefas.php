<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /login.php');
    exit;
}


require_once '../controllerTarefas/listartarefas.php';


$pdo = connectMysql();

$tarefasController = new TarefasController($pdo);
$tarefasEmAndamento = $tarefasController->tarefasEmAndamento();
$tarefasConcluidas = $tarefasController->buscarTarefasConcluidas();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gerenciamento - Tarefas</title>
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
            <h2>Tarefas</h2>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success mr-2" onclick="location.href='../tarefas/Criar.php';">Gerar Tarefa</button>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>Tarefas Concluidas</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tarefasConcluidas as $tarefa): ?>
                    <tr>
                        <td><?php echo $tarefa->nome_da_tarefa; ?></td>
                        <td><?php echo $tarefa->status; ?></td>
                        <td class="text-right">
                            <button type="button" class="btn btn-sm btn-primary mr-2" onclick="location.href='../tarefas/Editar.php?id=<?php echo $tarefa->id; ?>';">Editar</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="location.href='../controllerTarefas/deletartarefa.php?id=<?php echo $tarefa->id; ?>';">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Tarefas em Andamento</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tarefasEmAndamento as $tarefa): ?>
                    <tr>
                        <td><?php echo $tarefa->nome_da_tarefa; ?></td>
                        <td><?php echo $tarefa->status; ?></td>
                        <td class="text-right">
                            <button type="button" class="btn btn-sm btn-primary mr-2" onclick="location.href='../tarefas/Editar.php?id=<?php echo $tarefa->id; ?>';">Editar</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="location.href='../controllerTarefas/deletartarefa.php?id=<?php echo $tarefa->id; ?>';">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
