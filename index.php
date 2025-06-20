<?php 

require_once 'Controller/HomeController.php';
require_once 'Controller/BookController.php';

$controller = new HomeController();

$controller->index();

if ($_GET['page'] === 'book' && isset($_GET['id'])) {
    $controller = new BookController();
    $controller->show($_GET['id']);
}

if ($_GET['page'] === 'author' && isset($_GET['id'])) {
    $controller = new AuthorController();
    $controller->show($_GET['id']);
}

if ($_GET['page'] === 'genre' && isset($_GET['id'])) {
    $controller = new GenreController();
    $controller->show($_GET['id']);
}
