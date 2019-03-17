<?php

require_once("classes/config.php");

spl_autoload_register("autoload");

function autoload($nameClass) {
    $pathClass = "classes/" . $nameClass . ".php";
    if (file_exists($pathClass)) {
        require_once($pathClass);
    }
}