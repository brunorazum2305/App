<?php

use App\Controllers\GenreController;
use App\Controllers\MovieController;
use App\Core\Router;

Router::get('/movies', function () {
    return "Movies";
});

Router::get('/movies/show', [MovieController::class, 'show']);

Router::get('/genres', [GenreController::class, 'index']);
Router::get('/genres/show', [GenreController::class, 'show']);