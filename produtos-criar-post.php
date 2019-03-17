<?php

require_once("autoload.php");

$datas = Request::extract(["nome", "preco", "quantidade", "categoria_id"]);
$produto = new Product();
$produto->create($datas);
header("Location: produtos.php");