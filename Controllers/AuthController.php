<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'Models/UserModel.php';

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $userModel = new UserModel($this->db);
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                $_SESSION['user'] = ['id' => $user->GetID(), 'email' => $user->email];
                error_log("User logged in: " . $email);
                header("Location: index.php");
                exit;
            } else {
                error_log("Login failed for: " . $email);
                header("Location: index.php?page=login&error=1");
                exit;
            }
        } else {
            include __DIR__ . '/../View/templates/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $userModel = new UserModel($this->db);
            if ($userModel->createUser($email, $password)) {
                header("Location: index.php?page=login&message=registered");
                exit;
            } else {
                header("Location: index.php?page=register&error=exists");
                exit;
            }
        } else {
            include __DIR__ . '/../View/templates/register.php';
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
            error_log("User logged out");
            session_start();
            $_SESSION = array();
        }
        header("Location: index.php");
        exit;
    }
}