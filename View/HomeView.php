<?php

class HomeView {
    public static function render($books, $authors, $genres) {
        include __DIR__ . '/home.php';
    }
}
