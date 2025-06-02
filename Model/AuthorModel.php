<?php

class AuthorModel {
    public function getAllAuthors() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM authors");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
