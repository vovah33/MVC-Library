<?php
// Відображення помилок (для розробки)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Отримуємо параметри з URL
session_start(); // Ініціалізація сесії на початку
$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;

switch ($page) {
    case 'auth':
        require_once 'Controller/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case 'login':
        require_once 'Controller/AuthController.php';
        (new AuthController())->login();
        break;

    case 'register':
        require_once 'Controller/AuthController.php';
        $controller = new AuthController();
        $controller->register(); 
        break;

    case 'register_submit':
        require_once 'Controller/AuthController.php';
        (new AuthController())->register();
        break;

    case 'logout':
        require_once 'Controller/AuthController.php';
        (new AuthController())->logout();
        break;

    case 'favorites':
        require_once 'Controller/FavoritesController.php';
        $controller = new FavoritesController();
        $controller->index();
        break;

    case 'book':
        require_once 'Controller/BookController.php';
        $controller = new BookController();
        if ($id) {
            $controller->show($id);
        } else {
            echo "Book ID is missing.";
        }
        break;

    case 'books':
        require_once 'Controller/BookController.php';
        $controller = new BookController();
        $controller->listAll();
        break;

    case 'author':
        require_once 'Controller/AuthorController.php';
        $controller = new AuthorController();
        if ($id) {
            $controller->show($id);
        } else {
            echo "Author ID is missing.";
        }
        break;

    case 'authors':
        require_once 'Controller/AuthorController.php';
        $controller = new AuthorController();
        $controller->listAll();
        break;

    case 'genre':
        require_once 'Controller/GenreController.php';
        $controller = new GenreController();
        if ($id) {
            $controller->show($id);
        } else {
            echo "Genre ID is missing.";
        }
        break;

    case 'genres':
        require_once 'Controller/GenreController.php';
        $controller = new GenreController();
        $controller->listAll();
        break;

    case 'home':
    default:
        require_once 'Controller/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}