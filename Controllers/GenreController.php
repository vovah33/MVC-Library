<?php
require_once 'Models/GenreModel.php';

class GenreController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function show($id) {
    $genreModel = new GenreModel($this->db);
    $genre = $genreModel->getGenreById($id);

    $favoritesModel = new FavoritesModel($this->db);
    $userId = $_SESSION['user']['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $userId) {
        if (isset($_POST['remove_favorite'])) {
            $favoritesModel->removeFavorite($userId, 'genre', $id);
        } else {
            $favoritesModel->addFavorite($userId, 'genre', $id);
        }
        header("Location: index.php?page=genre&id=$id");
        exit;
    }

    $isFavorite = $userId ? $favoritesModel->isFavorite($userId, 'genre', $id) : false;

    include __DIR__ . '/../View/templates/genre.php';
}


    public function listAll() {
        $genreModel = new GenreModel($this->db);
        $genres = $genreModel->getAllGenres();
        include __DIR__ . '/../View/templates/genre_list.php';
    }
}