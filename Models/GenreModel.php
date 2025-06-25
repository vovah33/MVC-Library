<?php
require_once 'BaseModel.php';

class GenreModel extends BaseModel {
    public $id;
    public $name;
    public $description;
    public $icone;
    public $books;

    public function __construct($db) {
        parent::__construct($db, 'genres');
    }

    public function getGenreById($id) {
        $this->FindByID($id);
        $stmt = $this->db->prepare("SELECT b.id AS book_id, b.title FROM books b WHERE b.genre_id = ?");
        $stmt->execute([$this->id]);
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return get_object_vars($this);
    }

    public function getAllGenres() {
        return $this->FindAll();
    }
}