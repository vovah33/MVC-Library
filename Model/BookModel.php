<?php

class BookModel {
    private $conn;

        public function __construct() {
        $this->conn = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function getAllBooks() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM books");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
    $stmt = $this->conn->prepare("
        SELECT books.*, 
               authors.name AS author_name, 
               authors.id AS author_id,
               genres.name AS genre_name, 
               genres.id AS genre_id
        FROM books
        JOIN authors ON books.author_id = authors.id
        JOIN genres ON books.genre_id = genres.id
        WHERE books.id = ?
    ");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}




