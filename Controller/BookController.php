<?php
require_once 'Model/BookModel.php';
require_once 'View/BookView.php';

class BookController {
    public function show($id) {
        $model = new BookModel();
        $book = $model->getBookById($id);

        if ($book) {
            BookView::render($book);
        } else {
            echo "Book not found.";
        }
    }
}
