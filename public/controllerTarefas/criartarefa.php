<?php
ob_start();
use App\Classes\Tarefas;
require_once '../DB/connectMysql.php'; // Importe o arquivo de conexão com o banco de dados
require_once '../Classes/Tarefas.php'; // Importe o arquivo da classe Tarefas

        $nome_da_tarefa = $_POST['taskName'];
        $data_de_inicio = $_POST['startDate'];
        $prazo = $_POST['deadline'];
        $prioridade = $_POST['priority'];
        $descricao = $_POST['description'];
        $status = $_POST['status'];
        $responsavel = $_POST['responsible'];
        $observacoes = $_POST['observations'];

$pdo = connectMysql();


        $tarefas = new Tarefas($pdo);
        try {
            $tarefas->criarTarefa($nome_da_tarefa, $data_de_inicio, $prazo, $prioridade, $descricao, $status, $responsavel, $observacoes);
           header("Location: ../tarefas/tarefas.php");
            exit;
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
ob_end_clean();
