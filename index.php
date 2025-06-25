<?php
// Відображення помилок (для розробки)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Отримуємо параметри з URL
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Ініціалізація сесії лише якщо вона не активна
}
$page = filter_input(INPUT_GET, 'page', FILTER_DEFAULT) ?? 'home';
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT) ?? null;
if ($id !== null) {
    $id = filter_var($id, FILTER_VALIDATE_INT) ?: null;
}

require_once 'Config/Database.php';
$db = (new Database())->getConnection();

switch ($page) {
    case 'auth':
    case 'login':
        require_once 'Controllers/AuthController.php';
        $controller = new AuthController($db);
        $controller->login();
        break;

    case 'register':
    case 'register_submit':
        require_once 'Controllers/AuthController.php';
        $controller = new AuthController($db);
        $controller->register();
        break;

    case 'logout':
        require_once 'Controllers/AuthController.php';
        $controller = new AuthController($db);
        $controller->logout();
        break;

    case 'favorites':
        require_once 'Controllers/FavoritesController.php';
        $controller = new FavoritesController($db);
        $controller->index();
        break;

    case 'book':
        require_once 'Controllers/BookController.php';
        $controller = new BookController($db);
        if ($id) {
            $controller->show($id);
        } else {
            echo "Book ID is missing.";
        }
        break;

    case 'books':
        require_once 'Controllers/BookController.php';
        $controller = new BookController($db);
        $controller->listAll();
        break;

    case 'author':
        require_once 'Controllers/AuthorController.php';
        $controller = new AuthorController($db);
        if ($id) {
            $controller->show($id);
        } else {
            echo "Author ID is missing.";
        }
        break;

    case 'authors':
        require_once 'Controllers/AuthorController.php';
        $controller = new AuthorController($db);
        $controller->listAll();
        break;

    case 'genre':
        require_once 'Controllers/GenreController.php';
        $controller = new GenreController($db);
        if ($id) {
            $controller->show($id);
        } else {
            echo "Genre ID is missing.";
        }
        break;

    case 'genres':
        require_once 'Controllers/GenreController.php';
        $controller = new GenreController($db);
        $controller->listAll();
        break;

    case 'home':
    default:
        require_once 'Controllers/HomeController.php';
        $controller = new HomeController($db);
        $controller->index();
        break;
}