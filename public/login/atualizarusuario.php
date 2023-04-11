<?php


session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<div class="container">
    <h2>Editar Usuário</h2>

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<div class='alert alert-info'>" . $_SESSION['mensagem'] . "</div>";
        unset($_SESSION['mensagem']);
    }
    use App\Classes\Usuario;
    require_once '../Classes/Usuario.php';
    require_once '../DB/connectMysql.php';
    $pdo = connectMysql();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usuarioObj = new Usuario($pdo);
        $usuario = $usuarioObj->getUsuarioPorId($id);

        if ($usuario) {
            ?>
            <form id="form-atualizar-usuario" action="../controllerUsuarios/atualizarusuario.php" method="post">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $usuario['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" name="telefone" class="form-control" value="<?php echo $usuario['telefone']; ?>">
                </div>
                <div class="form-group">
                    <label>Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control" value="<?php echo $usuario['data_nascimento']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite a nova senha ou deixe em branco para não alterar">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
            <?php
        } else {
            echo "<p>Usuário não encontrado.</p>";
        }
    }
    ?>
</div>

</body>
</html>
