<?php
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarUsuario($nome, $email, $telefone, $senha, $data_nascimento) {
        // Primeiro, verificamos se o e-mail já existe no banco de dados
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            throw new Exception("E-mail já cadastrado");
        }

        // Se o e-mail não existe, criamos um novo usuário
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha, data_nascimento) VALUES (:nome, :email, :telefone, :senha, :data_nascimento)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":data_nascimento", $data_nascimento);
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(":senha", $senhaHash);
        if (!$stmt->execute()) {
            throw new Exception("Erro ao criar usuário");
        }
        return true;
    }
    public function listarUsuarios() {
        $stmt = $this->pdo->prepare("SELECT id, nome, email, telefone, senha, data_nascimento FROM usuarios");
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }

    public function deletarUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getUsuarioPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarUsuario($id, $nome, $email, $telefone, $data_nascimento, $senha)
    {
        if (!empty($senha)) {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento, senha = :senha WHERE id = :id");
            $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        } else {
            $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento WHERE id = :id");
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);

        return $stmt->execute();
    }
    // função para validar o login do usuário
    public function validarLogin($email, $senha)
    {
        // criar uma consulta SQL para buscar o usuário com o e-mail fornecido
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        // verificar se o usuário foi encontrado
        if (!$usuario) {
            // se não encontrou, retorna falso
            return false;
        }

        // verificar se a senha fornecida corresponde à senha do usuário
        if (password_verify($senha, $usuario['senha'])) {
            // se corresponder, retorna o ID do usuário
            return $usuario['id'];
        } else {
            // se não corresponder, retorna falso
            return false;
        }
    }




}
