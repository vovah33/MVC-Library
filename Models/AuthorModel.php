<?php
require_once 'BaseModel.php';

class AuthorModel extends BaseModel {
    public $id;
    public $name;
    public $bio;
    public $photo;
    public $books; // Додано оголошення властивості $books

    public function __construct($db) {
        parent::__construct($db, 'authors');
    }

    public function getAuthorById($id) {
        $this->FindByID($id);
        $stmt = $this->db->prepare("SELECT b.id AS book_id, b.title FROM books b WHERE b.author_id = ?");
        $stmt->execute([$this->id]);
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return get_object_vars($this);
    }

    public function getAllAuthors() {
        return $this->FindAll();
    }
}