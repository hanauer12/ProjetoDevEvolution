    <?php
    class Tarefas
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function criarTarefa($nome_da_tarefa, $data_de_inicio, $prazo, $prioridade, $descricao, $status, $responsavel, $observacoes)
        {
            $stmt = $this->pdo->prepare("INSERT INTO tarefas (nome_da_tarefa, data_de_inicio, prazo, prioridade, descricao, status, responsavel, observacoes) VALUES (:nome_da_tarefa, :data_de_inicio, :prazo, :prioridade, :descricao, :status, :responsavel, :observacoes)");
            $stmt->bindParam(":nome_da_tarefa", $nome_da_tarefa);
            $stmt->bindParam(":data_de_inicio", $data_de_inicio);
            $stmt->bindParam(":prazo", $prazo);
            $stmt->bindParam(":prioridade", $prioridade);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":responsavel", $responsavel);
            $stmt->bindParam(":observacoes", $observacoes);
            if (!$stmt->execute()) {
                throw new Exception("Erro ao criar tarefa");
            }
            return true;
        }

        public function buscarTarefasEmAndamento() {
            $sql = "SELECT * FROM tarefas WHERE status = 'Pendente' OR status = 'Em progresso'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscarTarefasConcluidas() {
            $sql = "SELECT * FROM tarefas WHERE status = 'Concluido'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function deletarTarefa($id)
        {
            $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }

        public function getTarefaPorId($id)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM tarefas WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizarTarefa($id, $nome_da_tarefa, $data_de_inicio, $prazo, $prioridade, $descricao, $status, $responsavel, $observacoes)
        {
            $stmt = $this->pdo->prepare("UPDATE tarefas SET nome_da_tarefa = :nome_da_tarefa, data_de_inicio = :data_de_inicio, prazo = :prazo, prioridade = :prioridade, descricao = :descricao, status = :status, responsavel = :responsavel, observacoes = :observacoes WHERE id = :id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome_da_tarefa', $nome_da_tarefa, PDO::PARAM_STR);
            $stmt->bindParam(':data_de_inicio', $data_de_inicio, PDO::PARAM_STR);
            $stmt->bindParam(':prazo', $prazo, PDO::PARAM_STR);
            $stmt->bindParam(':prioridade', $prioridade, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':responsavel', $responsavel, PDO::PARAM_STR);
            $stmt->bindParam(':observacoes', $observacoes, PDO::PARAM_STR);

            return $stmt->execute();


        }
    }
    ?>
