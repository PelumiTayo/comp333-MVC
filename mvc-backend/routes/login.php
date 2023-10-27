<?php

use src\Controllers\ProfileController;

$controller = new ProfileController();
switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        # handle get request
        ProfileController.show();
    case 'POST':
        # handle post request
        ProfileController.store();
}