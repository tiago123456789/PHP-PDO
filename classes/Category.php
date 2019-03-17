<?php


class Category extends Model {

    protected function table(): string
    {
        return "categorias";
    }

    protected function fields(): array
    {
        return ["id", "nome"];
    }
}