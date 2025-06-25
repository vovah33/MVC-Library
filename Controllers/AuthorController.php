<?php
require_once 'Models/AuthorModel.php';

class AuthorController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function show($id) {
    $bookModel = new BookModel($this->db);
    $book = $bookModel->getBookById($id);

    $favoritesModel = new FavoritesModel($this->db);
    $userId = $_SESSION['user']['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $userId) {
        if (isset($_POST['remove_favorite'])) {
            $favoritesModel->removeFavorite($userId, 'book', $id);
        } else {
            $favoritesModel->addFavorite($userId, 'book', $id);
        }
        header("Location: index.php?page=book&id=$id");
        exit;
    }

    $isFavorite = $userId ? $favoritesModel->isFavorite($userId, 'book', $id) : false;

    include __DIR__ . '/../View/templates/book.php';
}


    public function listAll() {
        $authorModel = new AuthorModel($this->db);
        $authors = $authorModel->getAllAuthors();
        include __DIR__ . '/../View/templates/author_list.php';
    }
}