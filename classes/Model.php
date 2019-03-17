<?php


abstract class Model
{

    protected $connection;

    protected $table;

    function __construct()
    {
        $this->connection = new ConnectionDB();
    }

    private function getFieldsOperationCreate() {
        $fields = [];
        foreach ($this->fields() as $field) {
            if ($field != "id")
                array_push($fields, $field);
        }

        return implode(", ", $fields);
    }

    private function getFieldsOperationUpdate() {
        $fields = [];
        foreach ($this->fields() as $field) {
            if ($field != "id")
                array_push($fields, "{$field} = :{$field}");
        }

        return implode(", ", $fields);
    }

    private function getNamedParameters($datas) {
        $keys = array_keys($datas);
        $keys = array_map(function($key) {
            return ":" . $key;
        }, $keys);

        return implode(", ", $keys);
    }

    private function applyValuesPreparedStatement($statement, $datas) {
        $keys = array_keys($datas);
        foreach ($keys as $key) {
            $statement->bindValue(":" . $key, $datas[$key]);
        }
    }

    public function update($id, $dataModified) {
        $sql = "UPDATE {$this->table()} SET {$this->getFieldsOperationUpdate()} WHERE id = :id";
        $stmt = $this->getConnection()->prepare($sql);
        $this->applyValuesPreparedStatement($stmt, $dataModified);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function create($datas) {
        $query = "INSERT INTO " . $this->table() . "(" . $this->getFieldsOperationCreate() . ") VALUES( " . $this->getNamedParameters($datas) . ")";
        $statement = $this->getConnection()->prepare($query);
        $this->applyValuesPreparedStatement($statement, $datas);
        $statement->execute();
    }

    public function findAll() {
        $fields = implode(", ", $this->fields());
        $query = "SELECT {$fields} FROM {$this->table()}";
        return $this->getConnection()->query($query)->fetchAll();
    }

    public function remove($id) {
        $sql = "DELETE FROM {$this->table()} WHERE id = :id";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function findById($id) {
        $fields = implode(", ", $this->fields());
        $sql = "SELECT {$fields} FROM {$this->table()} WHERE id = :id";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    protected function getConnection() {
        return $this->connection->getConnection();
    }

    abstract protected function table(): string;
    abstract protected function fields(): array;
}