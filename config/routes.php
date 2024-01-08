<?php

use App\Core\Router;

Router::get('/movies', function () {
    return "Movies";
});

Router::get('/genres', function () {
    return "Genres";
});