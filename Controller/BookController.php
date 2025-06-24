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

    public function listAll() {
        $model = new BookModel();
        $books = $model->getAllBooks();
        include 'View/templates/book_list.php';
    }
}
