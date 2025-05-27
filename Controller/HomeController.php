<?php 

class HomeController{
    public function index(){
        $books = ['book1', 'book2', 'book3'];
        $authors = ['author1','author2','author3'];
        $genres = ['genre1','genre2','genre3'];

        require 'View/home.php';
    }
}