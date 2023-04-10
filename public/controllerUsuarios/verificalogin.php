<?php
// incluir a classe Usuario e conectar ao banco de dados
require_once '../Classes/Usuario.php';
require_once '../DB/connectMysql.php';
$pdo = connectMysql();

// verificar se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // obter o e-mail e a senha do usuário do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    // criar uma instância da classe Usuario
    $usuarioObj = new Usuario($pdo);

    // chamar a função validarLogin
    $idUsuario = $usuarioObj->validarLogin($email, $senha);

    // verificar se o login foi bem sucedido
    if ($idUsuario) {
        // define a variável de sessão
        $_SESSION['id_usuario'] = $idUsuario;
        // redireciona para a página index.php
        header("Location: /index.php");
        exit();
    } else {
        // se o login falhar, exibir uma mensagem de erro
        header("Location: ../login.php?erro=1");
        exit();
    }

}
