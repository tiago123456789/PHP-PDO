<?php

require_once 'autoload.php';

$dataRequest = Request::extract(["nome"]);
$category = new Category();
$category->create($dataRequest);
header("Location: categorias.php");