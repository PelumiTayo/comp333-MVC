<?php

switch($_SERVER['REQUEST_METHOD'])
{
        # handle get request
    case 'GET':
        # handle post request
    case 'POST':
        # validate user input
        # Create new UserModel using post fields
        # call newUser->create() to push to db
        # a new $user should look like
        # $user = ['username' => 'new_username', 'password' => 'new_password']
        $user = new \src\Models\UserModel();
        $user->create(['username' => $_POST['username'], 'password' => $_POST['password']]);
}