<?php

require_once("autoload.php");

try {
    $datasRequest = Request::extract(["id", "nome"]);
    $category = new Category();
    $category->update($datasRequest["id"], $datasRequest);
    header("Location: categorias.php");
} catch(\Exception $e) {
    HandlerException::handler($e);
}
