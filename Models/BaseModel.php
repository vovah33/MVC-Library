<?php
require_once 'ORMinterface.php';

class BaseModel implements ORMinterface {
    protected $db;
    protected $table;
    protected $id;

    public function __construct($db, $table) {
        $this->db = $db;
        $this->table = $table;
    }

public function Save() {
    $data = get_object_vars($this);
    unset($data['db'], $data['table']);

    if ($this->id) {
        // UPDATE
        $columns = array_keys($data);
        $set = implode(" = ?, ", $columns) . " = ?";
        $sql = "UPDATE {$this->table} SET $set WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $values = array_values($data);
        $values[] = $this->id;
        $stmt->execute($values);
    } else {
        // INSERT
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);

        $params = [];
        foreach ($data as $key => $value) {
            $params[":$key"] = $value;
        }
        $stmt->execute($params);
        $this->id = $this->db->lastInsertId();
    }
}


    public function Delete() {
        if ($this->id) {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $stmt->execute([$this->id]);
            $this->id = null;
        }
    }

    public function GetID() {
        return $this->id;
    }

    public function FindByID($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
            return $this;
        }
        return null;
    }

    public function FindAll() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}