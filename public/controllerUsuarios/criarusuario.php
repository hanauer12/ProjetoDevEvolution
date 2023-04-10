<?php

$servername = "mariadb";
$username = "root";
$password = "mariadb";
$dbname = "DEVEVOLUTION";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    throw new Exception("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

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
    echo $e->getMessage();
}
