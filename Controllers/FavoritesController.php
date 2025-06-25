<?php

require_once __DIR__ . '/../Models/FavoritesModel.php';
require_once __DIR__ . '/../Models/BookModel.php';
require_once __DIR__ . '/../Models/AuthorModel.php';
require_once __DIR__ . '/../Models/GenreModel.php';

class FavoritesController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $favoritesModel = new FavoritesModel($this->db);
        $favorites = $favoritesModel->getFavorites($userId);

        // 🔽 додаємо $db, щоб воно було доступне у шаблоні
        $db = $this->db;

        include __DIR__ . '/../View/templates/favorites.php';
    }

    public function toggleFavorite($type, $id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $favoritesModel = new FavoritesModel($this->db);

        if ($favoritesModel->isFavorite($userId, $type, $id)) {
            $favoritesModel->removeFavorite($userId, $type, $id);
        } else {
            $favoritesModel->addFavorite($userId, $type, $id);
        }

        header("Location: index.php?page={$type}&id={$id}");
        exit;
    }
}
