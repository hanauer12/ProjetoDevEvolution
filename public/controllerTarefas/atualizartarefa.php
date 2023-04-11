<?php
ob_start();
use App\Classes\Tarefas;
require_once '../Classes/Tarefas.php';
require_once '../DB/connectMysql.php';
$pdo = connectMysql();

$id = $_POST['taskId'];
$nome_da_tarefa = $_POST['nome_da_tarefa'];
$data_de_inicio = $_POST['data_de_inicio'];
$prazo = $_POST['prazo'];
$prioridade = $_POST['prioridade'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];
$responsavel = $_POST['responsavel'];
$observacoes = $_POST['observacoes'];


$tarefas = new Tarefas($pdo);
$atualizado = $tarefas->atualizarTarefa($id, $nome_da_tarefa, $data_de_inicio, $prazo, $prioridade, $descricao, $status, $responsavel, $observacoes);

if ($atualizado) {
   header("Location: ../tarefas/tarefas.php"); // Altere o caminho para a página que deseja redirecionar em caso de sucesso
    exit;
} else {
    header("Location: caminho/para/sua/pagina/erro.php"); // Altere o caminho para a página que deseja redirecionar em caso de erro
    exit;
}
ob_end_clean();
?>