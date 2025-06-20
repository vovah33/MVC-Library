<?php

class AuthorModel {
    private $conn;
    
    public function getAllAuthors() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM authors");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAuthorById($id) {
    $stmt = $this->conn->prepare("
        SELECT * FROM authors WHERE id = ?
    ");
    $stmt->execute([$id]);
    $author = $stmt->fetch(PDO::FETCH_ASSOC);

    // Отримуємо всі книги автора
    $stmt = $this->conn->prepare("SELECT * FROM books WHERE author_id = ?");
    $stmt->execute([$id]);
    $author['books'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $author;
}

}
