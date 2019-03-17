<?php

class Request
{

    static public function extract(array $keys) {
        $datas = [];

        foreach ($keys as $key) {
            $valueMethodGet = $_GET[$key];
            if ($valueMethodGet) {
                $datas[$key] = $valueMethodGet;
            } else {
                $datas[$key] = $_POST[$key];
            }
        }

        return $datas;
    }
}