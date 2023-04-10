<?php
session_start();
require_once '../Classes/Usuario.php';
require_once '../DB/connectMysql.php';
$pdo = connectMysql();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];

    $usuarioObj = new Usuario($pdo);
    $atualizado = $usuarioObj->atualizarUsuario($id, $nome, $email, $telefone, $data_nascimento, $senha);

    if ($atualizado) {
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Houve um erro ao atualizar o usuário.";
    }

    header("Location: ../login/editarusuario.php?id=" . $id);
    exit;
}
