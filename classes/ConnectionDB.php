<?php

class ConnectionDB {

    private static $connection;

    public function getConnection() {
        if (self::$connection) {
            return self::$connection;
        }

        self::$connection = new \PDO(
            DB_DRIVE . ":host=". DB_HOST . ";dbname=" . DB_NAME . ";",
            DB_USER,
            DB_PASSWORD
        );
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connection;
    }
}