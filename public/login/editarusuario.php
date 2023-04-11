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
    <title>Listar Logins</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclua o CSS do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<div class="container-fluid">
    ...
    <div class="row mt-5">
        <div class="col-md-12">
            <a href="../index.php" class="btn btn-primary">Voltar</a>
            <h3>Listar Logins</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Data de Nascimento</th>
                        <th>Senha</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (isset($_GET['updated']) && $_GET['updated'] == '1') {
                        header("refresh:5;url=index.php");
                    }
                    use App\Classes\Usuario;
                    require_once '../Classes/Usuario.php';
                    require_once '../DB/connectMysql.php';
                    $pdo = connectMysql();
                    $usuarioObj = new Usuario($pdo);
                    $usuarios = $usuarioObj->listarUsuarios();

                    foreach ($usuarios as $usuario) {
                        echo "<tr>";
                        echo "<td>" . $usuario['id'] . "</td>";
                        echo "<td>" . $usuario['nome'] . "</td>";
                        echo "<td>" . $usuario['email'] . "</td>";
                        echo "<td>" . $usuario['telefone'] . "</td>";
                        echo "<td>" . $usuario['data_nascimento'] . "</td>";
                        echo "<td>****</td>";
                        echo "<td><button type='button' class='btn btn-danger' onclick='deletarUsuario(" . $usuario['id'] . ")'>Deletar</button></td>";
                        echo "<td><button type='button' class='btn btn-warning' onclick='editarUsuario(" . $usuario['id'] . ")'>Editar</button></td>";

                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function deletarUsuario(id) {
        if (confirm("Tem certeza que deseja deletar este usuário?")) {
            window.location.href = "../controllerUsuarios/deletarusuario.php?id=" + id;
        }
    }
    function editarUsuario(id) {
        window.location.href = "atualizarusuario.php?id=" + id;
    }
</script>
