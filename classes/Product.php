<?php

class Product extends Model
{

    public function findAll() {
        $sql = "SELECT p.id, p.nome, p.preco, p.quantidade, c.nome AS categoria_nome 
                FROM produtos AS p INNER JOIN categorias AS c ON (p.categoria_id = c.id)
                ORDER BY p.nome";
        return $this->getConnection()->query($sql)->fetchAll();
    }

    protected function table(): string
    {
        return "produtos";
    }

    protected function fields(): array
    {
        return ["id", "nome", "preco", "quantidade", "categoria_id"];
    }
}