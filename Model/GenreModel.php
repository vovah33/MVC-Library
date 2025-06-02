<?php

class GenreModel {
    public function getAllGenres() {
        $db = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');
        $query = $db->query("SELECT * FROM genres");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
