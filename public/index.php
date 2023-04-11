<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}
use App\Classes\PlanoDeEstudos;
use App\Classes\Tarefas;

require_once  'Classes/Tarefas.php';
require_once  'Classes/Planos.php';
require_once 'DB/connectMysql.php';
$pdo = connectMysql();

$tarefas = new Tarefas($pdo);
$planos = new PlanoDeEstudos($pdo);


$tarefasEmAndamento = count($tarefas->buscarTarefasEmAndamento());
$tarefasConcluidas = count($tarefas->buscarTarefasConcluidas());
$planosEmAndamento = count($planos->buscarPlanosEmAndamento());
$planosConcluidos = count($planos->buscarPlanosConcluidos());

$totalTarefas = $tarefasEmAndamento + $tarefasConcluidas;
$porcentagemTarefasEmAndamento = ($totalTarefas > 0) ? ($tarefasEmAndamento / $totalTarefas) * 100 : 0;
$porcentagemTarefasConcluidas = ($totalTarefas > 0) ? ($tarefasConcluidas / $totalTarefas) * 100 : 0;

$totalPlanos = $planosEmAndamento + $planosConcluidos;
$porcentagemPlanosEmAndamento = ($totalPlanos > 0) ? ($planosEmAndamento / $totalPlanos) * 100 : 0;
$porcentagemPlanosConcluidos = ($totalPlanos > 0) ? ($planosConcluidos / $totalPlanos) * 100 : 0;


?>



<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gerenciamento</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclua o CSS do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Inclua o CSS personalizado -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Inclua o jQuery e o JavaScript do Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclua o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Inclua o CanvasJS -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div class="sidenav">
    <div class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-tasks"></i> Tarefas</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="tarefas/tarefas.php">Listar  Tarefas</a>
            <a class="dropdown-item" href="tarefas/Criar.php">Criar Nova tarefa</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-graduate"></i> Planos de estudo</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="planos/planos.php">Listar  Planos de estudo</a>
            <a class="dropdown-item" href="planos/Criar.php">Criar Novo Plano</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user"></i> Usuario</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="login/editarusuario.php">Listar Usuario</a>
            <a class="dropdown-item" href="login/registrar.php">Criar Novo Usuario</a>
        </div>
    </div>
    <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="container-fluid" style="margin-left: 200px;">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">

                        <div id="chartContainer1" style="height: 340px; width: 120%;"></div>
                    </div>
                    <div class="col-md-6">

                        <div id="chartContainer2" style="height: 340px; width: 120%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="javascript/scripts.js"></script>
    <script>
        const porcentagemTarefasEmAndamento = <?php echo $porcentagemTarefasEmAndamento; ?>;
        const porcentagemTarefasConcluidas = <?php echo $porcentagemTarefasConcluidas; ?>;
        const porcentagemPlanosEmAndamento = <?php echo $porcentagemPlanosEmAndamento; ?>;
        const porcentagemPlanosConcluidos = <?php echo $porcentagemPlanosConcluidos; ?>;
    </script>

    <!-- O conteúdo do seu arquivo HTML deve permanecer o mesmo, sem a parte <style> e sem os scripts JavaScript no final. -->
</body>
</html>
