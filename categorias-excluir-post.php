<?php

require_once("autoload.php");

$id = $_GET["id"];
$category = new Category();
$category->remove($id);
header("Location: categorias.php");


