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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a href="../index.php" class="btn btn-primary float-left mr-3">Voltar</a>
            <h2>Cadastro de Usuário</h2>
            <form method="post" action="../controllerUsuarios/criarusuario.php">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="form-group">
                    <label for="confirma_senha">Confirme a Senha:</label>
                    <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<script>
    // Verifique se há uma mensagem de erro na variável de sessão
    <?php if (isset($_SESSION['error_message'])): ?>
    // Exiba a mensagem de erro em um pop-up
    alert("<?php echo $_SESSION['error_message']; ?>");
    // Limpe a variável de sessão
    <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
</script>
</body>

</html>
