<?php
require_once 'Models/BookModel.php';
require_once 'Models/AuthorModel.php';
require_once 'Models/GenreModel.php';

class HomeController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $bookModel = new BookModel($this->db);
        $authorModel = new AuthorModel($this->db);
        $genreModel = new GenreModel($this->db);
        $books = $bookModel->FindAll();
        $authors = $authorModel->FindAll();
        $genres = $genreModel->FindAll();
        include __DIR__ . '/../View/templates/home.php';
    }
}