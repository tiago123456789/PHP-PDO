<?php

require_once("autoload.php");

$id = $_GET["id"];
$produto = new Product();
$produto->remove($id);
header("Location: produtos.php");