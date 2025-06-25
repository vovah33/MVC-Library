<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'Model/UserModel.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new UserModel();
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
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
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new UserModel();
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
            error_log("User logged out"); // Відладка
            session_start(); // Ініціалізація нової сесії після знищення
            $_SESSION = array(); // Очищення сесійних даних
        }
        header("Location: index.php");
        exit;
    }
}