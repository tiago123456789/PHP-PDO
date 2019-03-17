<?php


class Category {

    public $connection;

    function __construct() {
        $this->connection = new ConnectionDB();
    }

    public function findAll() {
        $query = "SELECT id, nome FROM categorias";
        $datas = $this->connection
                            ->getConnection()
                            ->query($query)
                            ->fetchAll();
        return $datas;
    }

    public function update($id, $nome) {
        $sql = "UPDATE categorias SET nome = :nome WHERE id = :id ";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function remove($id) {
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function findById($id) {
        $sql = "SELECT id, nome FROM categorias WHERE id = :id";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($nome) {
        $sql = "INSERT INTO categorias(nome) VALUES(:nome)";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->execute();
    }
}