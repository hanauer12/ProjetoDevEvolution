<?php
use App\Classes\Usuario;
require_once '../DB/connectMysql.php';
$pdo = connectMysql();
require_once "../Classes/Usuario.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$senha = $_POST["senha"];
$data_nascimento = $_POST["data_nascimento"];

$usuario = new Usuario($pdo);


try {
    $usuario->criarUsuario($nome, $email, $telefone, $senha, $data_nascimento);
    header("Location: ../login/editarusuario.php");
} catch (Exception $e) {
    //se tiver exceção armazena na variavel
    $_SESSION['error_message'] = $e->getMessage();
    header("Location: ../login/registrar.php");

}
