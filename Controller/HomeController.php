<?php  
require_once 'Controller/Controller.php';
require_once 'Model/BookModel.php';
require_once 'Model/AuthorModel.php';
require_once 'Model/GenreModel.php';
require_once 'View/HomeView.php';

class HomeController extends Controller {
    public function index() {
        $bookModel = new BookModel();
        $authorModel = new AuthorModel();
        $genreModel = new GenreModel();

        $books = $bookModel->getAllBooks();
        $authors = $authorModel->getAllAuthors();
        $genres = $genreModel->getAllGenres();

        HomeView::render($books, $authors, $genres);
    }
}
