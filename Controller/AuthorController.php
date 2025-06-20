<?php  
require_once 'Model/AuthorModel.php';
require_once 'View/AuthorView.php';

class AuthorController {
    public function show($id) {
        $model = new AuthorModel();
        $author = $model->getAuthorById($id);
        AuthorView::render($author);
    }
}
