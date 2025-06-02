<?php

class BookModel {
    public function getAllBooks() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM books");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
