<?php
require_once '../DB/connectMysql.php';
require_once '../Classes/Tarefas.php';
$pdo = connectMysql();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de tarefa inválido.");
}

$id = intval($_GET['id']);
//var_dump($id);
//exit;

try {
    $tarefaObj = new Tarefas($pdo);
    $tarefaObj->deletarTarefa($id);
   // header("Location: ../tarefas/tarefas.php");
    exit;
} catch (Exception $e) {
    die("Erro ao deletar tarefa: " . $e->getMessage());
}
?>
