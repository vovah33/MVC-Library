<?php  
require_once 'Model/GenreModel.php';
require_once 'View/GenreView.php';


class GenreController {
    public function show($id) {
        $model = new GenreModel();
        $genre = $model->getGenreById($id);
        include 'View/templates/genre.php';
    }

    public function listAll() {
        $model = new GenreModel();
        $genres = $model->getAllGenres();
        include 'View/templates/genre_list.php';
    }
}
