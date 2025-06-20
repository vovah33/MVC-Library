<?php

class GenreModel {
    private $conn;

    public function getAllGenres() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM genres");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGenreById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM genres WHERE id = ?");
    $stmt->execute([$id]);
    $genre = $stmt->fetch(PDO::FETCH_ASSOC);

    
    $stmt = $this->conn->prepare("SELECT * FROM books WHERE genre_id = ?");
    $stmt->execute([$id]);
    $genre['books'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $genre;
}

}
