<?php

class Product
{

    private $connnection;

    function __construct()
    {
        $this->connnection = new ConnectionDB();
    }

    public function findAll() {
        $sql = "SELECT p.id, p.nome, p.preco, p.quantidade, c.nome AS categoria_nome 
                FROM produtos AS p INNER JOIN categorias AS c ON (p.categoria_id = c.id)
                ORDER BY p.nome";
        return $this->connnection
                ->getConnection()
                ->query($sql)
                ->fetchAll();

    }

    public function findById($id) {
        $sql = "SELECT id, nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";
        $stmt = $this->connnection->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function remove($id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->connnection->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function update($id, $dataModified) {
        $sql = "UPDATE produtos SET 
                  nome = :nome, preco = :preco, quantidade = :quantidade,
                  categoria_id = :categoria_id
                WHERE id = :id";

        $stmt = $this->connnection->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $dataModified["nome"]);
        $stmt->bindValue(":preco", $dataModified["preco"]);
        $stmt->bindValue(":quantidade", $dataModified["quantidade"]);
        $stmt->bindValue(":categoria_id", $dataModified["categoria_id"]);
        $stmt->execute();
    }

    public function create($newProduct) {
        $query = "INSERT INTO produtos(nome, preco, quantidade, categoria_id) 
                  VALUES(:nome, :preco, :quantidade, :categoria_id)";

        $statement = $this->connnection->getConnection()->prepare($query);
        $statement->bindValue(":nome", $newProduct["nome"]);
        $statement->bindValue(":preco", $newProduct["preco"]);
        $statement->bindValue(":quantidade", $newProduct["quantidade"]);
        $statement->bindValue(":categoria_id", $newProduct["categoria_id"]);
        $statement->execute();
    }

    public function findAllByCategoriaId($idCategoria) {
        $query = "SELECT id, nome FROM produtos where categoria_id = :categoria_id";
        $stmt = $this->connnection->getConnection()->prepare($query);
        $stmt->bindValue(":categoria_id", $idCategoria);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}