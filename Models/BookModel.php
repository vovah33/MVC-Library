<?php
require_once 'BaseModel.php';

class BookModel extends BaseModel {
    public $id;
    public $title;
    public $author_id;
    public $genre_id;
    public $cover;
    public $description;
    public $genre_name; // Додано оголошення властивості
    public $author_name; // Додано оголошення властивості

    public function __construct($db) {
        parent::__construct($db, 'books');
    }

    public function getBookById($id) {
        $this->FindByID($id);
        $stmt = $this->db->prepare("SELECT g.name AS genre_name FROM genres g WHERE g.id = ?");
        $stmt->execute([$this->genre_id]);
        $genre = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->genre_name = $genre['genre_name'] ?? 'Unknown genre';

        $stmt = $this->db->prepare("SELECT a.name AS author_name FROM authors a WHERE a.id = ?");
        $stmt->execute([$this->author_id]);
        $author = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->author_name = $author['author_name'] ?? 'Unknown author';

        return get_object_vars($this);
    }

    public function getAllBooks() {
        return $this->FindAll();
    }
}