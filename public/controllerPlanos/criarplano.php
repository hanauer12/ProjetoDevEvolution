<?php

require_once '../Classes/Planos.php';
require_once '../DB/connectMysql.php';
$pdo = connectMysql();

$nome_plano = $_POST['nome_plano'];
$data_inicio = $_POST['data_inicio'];
$data_termino = $_POST['data_termino'];
$objetivo_estudo = $_POST['objetivo_estudo'];
$recursos_estudo = $_POST['recursos_estudo'];
$notas_adicionais = $_POST['notas_adicionais'];
$status = $_POST['status'];

$planoDeEstudos = new PlanoDeEstudos($pdo);
$planoDeEstudos->criarPlanoDeEstudo($nome_plano, $data_inicio, $data_termino, $objetivo_estudo, $recursos_estudo, $notas_adicionais, $status);

header('Location: ../planos/planos.php');
