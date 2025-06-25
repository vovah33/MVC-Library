<?php
require_once __DIR__ . '/../Models/BookModel.php';
require_once __DIR__ . '/../Models/FavoritesModel.php';


class BookController {
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
        $bookModel = new BookModel($this->db);
        $books = $bookModel->getAllBooks();
        include __DIR__ . '/../View/templates/book_list.php';
    }
}
