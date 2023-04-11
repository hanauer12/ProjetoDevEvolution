<?php
require_once '../Classes/Tarefas.php';
require_once '../DB/connectMysql.php';
use App\Classes\Tarefas;
$pdo = connectMysql();
class TarefasController {
    private $tarefa;

    public function __construct($pdo) {
        $this->tarefa = new Tarefas($pdo);
    }

    public function tarefasEmAndamento() {
        $tarefas = $this->tarefa->buscarTarefasEmAndamento();
        return $tarefas;
    }

    public function buscartarefasConcluidas() {
        $tarefas = $this->tarefa->buscarTarefasConcluidas();
        return $tarefas;
    }

    public function getTarefaPorId($id) {
        return $this->tarefa->getTarefaPorId($id);
    }


}

$tarefasController = new TarefasController($pdo);
$tarefasEmAndamento = $tarefasController->tarefasEmAndamento();
$tarefasConcluidas = $tarefasController->buscartarefasConcluidas();


