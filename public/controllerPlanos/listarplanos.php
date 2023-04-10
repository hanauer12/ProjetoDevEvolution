<?php
require_once '../Classes/Planos.php';
require_once '../DB/connectMysql.php';

$pdo = connectMysql();

class PlanosController {
    private $planoDeEstudos;

    public function __construct($pdo) {
        $this->planoDeEstudos = new PlanoDeEstudos($pdo);
    }

    public function listarPlanosDeEstudo() {
        $planos = $this->planoDeEstudos->listarPlanosDeEstudo();
        return $planos;
    }

    public function planosEmAndamento() {
        $planos = $this->planoDeEstudos->buscarPlanosEmAndamento();
        return $planos;
    }

    public function buscarPlanosConcluidos() {
        $planos = $this->planoDeEstudos->buscarPlanosConcluidos();
        return $planos;
    }
    public function atualizarPlano($id, $nome_plano, $data_inicio, $data_termino, $objetivo_estudo, $recursos_estudo, $notas_adicionais)
    {
        return $this->planoDeEstudos->atualizarPlanoDeEstudo($id, $nome_plano, $data_inicio, $data_termino, $objetivo_estudo, $recursos_estudo, $notas_adicionais);
    }

    public function obterPlanoDeEstudo($id) {
        return $this->planoDeEstudos->buscarPlanoDeEstudoPorId($id);
    }

}

$planosController = new PlanosController($pdo);
$planosDeEstudo = $planosController->listarPlanosDeEstudo();
