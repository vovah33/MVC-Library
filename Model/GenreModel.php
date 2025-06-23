<?php

class GenreModel {
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllGenres() {
        $query = $this->conn->query("SELECT id, name, description, icone FROM genres");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGenreById($id) {
        $stmt = $this->conn->prepare("SELECT id, name, description, icone FROM genres WHERE id = ?");
        $stmt->execute([$id]);
        $genre = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->conn->prepare("SELECT * FROM books WHERE genre_id = ?");
        $stmt->execute([$id]);
        $genre['books'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $genre;
    }
}