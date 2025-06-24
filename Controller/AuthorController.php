<?php  
require_once 'Model/AuthorModel.php';
require_once 'View/AuthorView.php';

class AuthorController {
    public function show($id) {
        $model = new AuthorModel();
        $author = $model->getAuthorById($id);
        include 'View/templates/author.php';
    }

    public function listAll() {
        $model = new AuthorModel();
        $authors = $model->getAllAuthors();
        include 'View/templates/author_list.php';
    }
}
