<?php  
require_once 'Model/GenreModel.php';
require_once 'View/GenreView.php';

class GenreController {
    public function show($id) {
        $model = new GenreModel();
        $genre = $model->getGenreById($id);
        GenreView::render($genre);
    }
}
