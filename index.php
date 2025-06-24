<?php
// Відображення помилок (для розробки)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Отримуємо параметри з URL
$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;

switch ($page) {
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
