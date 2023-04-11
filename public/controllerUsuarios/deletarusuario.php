<?php
use App\Classes\Usuario;
require_once '../DB/connectMysql.php';
require_once '../Classes/Usuario.php';

$pdo = connectMysql();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de usuário inválido.");
}

$id = intval($_GET['id']);

try {
    $usuarioObj = new Usuario($pdo);
    $usuarioObj->deletarUsuario($id);
    header("Location: ../login/editarusuario.php");
    exit;
} catch (Exception $e) {
    die("Erro ao deletar usuário: " . $e->getMessage());
}
?>
