<?php

namespace src\Controllers;
include_once 'BaseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Models/UserModel.php';

use src\Models\UserModel;
class UserController extends BaseController
{
    /**
     * Creates new user session from login credentials
     *
     * @return void
     */
    function create() {

    }

    /**
     * Stores new user information in the database
     *
     * @return bool
     */
    function store($request): bool
    {
        $userModel = new UserModel();
        $request_username = $request['username'];
        # validate $request_username
        $validated = array();
        if ($userModel->create($request)) {
            # return some success case (depends on how to handle back- to frontend communication)
            return true;
        }
        else {
            # return some failure case
            return false;
        }
    }
}

?>