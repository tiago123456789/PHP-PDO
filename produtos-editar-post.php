<?php

require_once("autoload.php");

$datas = Request::extract(["id", "nome", "preco", "quantidade", "categoria_id"]);
$produto = new Product();
$produto->update($datas["id"], $datas);
header("Location: produtos.php");