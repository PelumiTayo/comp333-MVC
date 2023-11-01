<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/src/Controllers/RatingController.php';
use src\Controllers\RatingController;

$ratingController = new RatingController();

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET': # handle get request
        $ratingController->show();
    case 'POST': # handle post request
        $request = array(
        'username' => $_POST['username'],
        'title' => $_POST['title'],
        'artist' => $_POST['artist'],
        'rating' => $_POST['rating']
        );
        $ratingController->store($request);
    case 'PATCH':
        $request = array(
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'title' => $_POST['title'],
            'artist' => $_POST['artist'],
            'rating' => $_POST['rating']
        );
        $ratingController->update($request);
}