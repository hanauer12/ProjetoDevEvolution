<?php

namespace App\Classes;
use PDO;

class PlanoDeEstudos
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function criarPlanoDeEstudo($nome_plano, $data_inicio, $data_termino, $objetivo_estudo, $recursos_estudo, $notas_adicionais, $status)
    {
        $sql = "INSERT INTO planos_de_estudo (nome_plano, data_inicio, data_termino, objetivo_estudo, recursos_estudo, notas_adicionais, status)
        VALUES (:nome_plano, :data_inicio, :data_termino, :objetivo_estudo, :recursos_estudo, :notas_adicionais, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome_plano', $nome_plano);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':data_termino', $data_termino);
        $stmt->bindParam(':objetivo_estudo', $objetivo_estudo);
        $stmt->bindParam(':recursos_estudo', $recursos_estudo);
        $stmt->bindParam(':notas_adicionais', $notas_adicionais);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }



    public function listarPlanosDeEstudo()
    {
        $sql = "SELECT * FROM planos_de_estudo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function buscarPlanosEmAndamento()
    {
        $sql = "SELECT * FROM planos_de_estudo WHERE status = 'Em Andamento'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPlanosConcluidos()
    {
        $sql = "SELECT * FROM planos_de_estudo WHERE status = 'Concluído'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function deletarPlanoDeEstudo($id)
    {
        $sql = "DELETE FROM planos_de_estudo WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
    public function buscarPlanoDeEstudoPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT id, nome_plano, data_inicio, data_termino, objetivo_estudo, recursos_estudo, notas_adicionais, status FROM planos_de_estudo WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function atualizarPlano($id, $nome_plano, $data_inicio, $data_termino, $objetivo_estudo, $recursos_estudo, $notas_adicionais, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE planos_de_estudo SET nome_plano = :nome_plano, data_inicio = :data_inicio, data_termino = :data_termino, objetivo_estudo = :objetivo_estudo, recursos_estudo = :recursos_estudo, notas_adicionais = :notas_adicionais, status = :status WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome_plano', $nome_plano, PDO::PARAM_STR);
        $stmt->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':data_termino', $data_termino, PDO::PARAM_STR);
        $stmt->bindParam(':objetivo_estudo', $objetivo_estudo, PDO::PARAM_STR);
        $stmt->bindParam(':recursos_estudo', $recursos_estudo, PDO::PARAM_STR);
        $stmt->bindParam(':notas_adicionais', $notas_adicionais, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
    }

}
?>