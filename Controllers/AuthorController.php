<?php
require_once 'Models/AuthorModel.php';
require_once 'Models/BookModel.php';
require_once 'Models/FavoritesModel.php';


class AuthorController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function show($id) {
    $authorModel = new AuthorModel($this->db);
    $author = $authorModel->getAuthorById($id);

    $favoritesModel = new FavoritesModel($this->db);
    $userId = $_SESSION['user']['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $userId) {
        if (isset($_POST['remove_favorite'])) {
            $favoritesModel->removeFavorite($userId, 'author', $id);
        } else {
            $favoritesModel->addFavorite($userId, 'author', $id);
        }
        header("Location: index.php?page=author&id=$id");
        exit;
    }

    $isFavorite = $userId ? $favoritesModel->isFavorite($userId, 'author', $id) : false;

    include __DIR__ . '/../View/templates/author.php';
}


    public function listAll() {
        $authorModel = new AuthorModel($this->db);
        $authors = $authorModel->getAllAuthors();
        include __DIR__ . '/../View/templates/author_list.php';
    }
}