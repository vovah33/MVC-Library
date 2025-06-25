<?php
require_once 'Model/UserModel.php';
require_once 'Model/FavoritesModel.php';

class FavoritesController {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $favoritesModel = new FavoritesModel($this->db);
        $favorites = $favoritesModel->getFavorites($userId);

        include __DIR__ . '/../View/templates/favorites.php';
    }
}