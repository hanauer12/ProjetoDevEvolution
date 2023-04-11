<?php
use App\Classes\PlanoDeEstudos;
require_once '../Classes/Planos.php';
require_once '../DB/connectMysql.php';
$pdo = connectMysql();

$id = $_GET['id'];

$planoDeEstudos = new PlanoDeEstudos($pdo);
$planoDeEstudos->deletarPlanoDeEstudo($id);

header('Location: ../planos/planos.php');
