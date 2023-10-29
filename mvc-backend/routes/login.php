<?php

use src\Controllers\ProfileController;

$controller = new ProfileController();
switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        # handle get request
        $controller->show();
    case 'POST':
        # handle post request
        $controller->store();
}