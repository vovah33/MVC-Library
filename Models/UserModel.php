<?php
require_once 'BaseModel.php';

class UserModel extends BaseModel {
    public $id;
    public $email;
    public $password;

    public function __construct($db) {
        parent::__construct($db, 'users');
    }

    public function createUser($email, $password) {
        if (strlen($password) < 6) return false;
        $check = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([filter_var($email, FILTER_SANITIZE_EMAIL)]);
        if ($check->fetch()) return false;

        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->Save();
        return true;
    }

    public function authenticate($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([filter_var($email, FILTER_SANITIZE_EMAIL)]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            return $this;
        }
        return false;
    }
}