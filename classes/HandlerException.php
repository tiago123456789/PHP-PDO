<?php


class HandlerException
{

    static public function handler(\Exception $exception) {
        if (DEBUG) {
            echo("<pre>");
            print_r($exception);
            echo("</pre>");
        } else {
            echo $exception->getMessage();
        }
    }
}