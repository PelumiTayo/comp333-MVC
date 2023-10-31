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
     * @param $request
     * @return bool
     */
    function create($request): bool {
        $userModel = new UserModel();
        $username_request = array('username'=>$request['username']);
        $password_request = $request['password'];
        try {
            $rows = $userModel->retrieve($username_request);
            $user_result = $rows[0];
            if (count($user_result) > 0) {
                $user_password = $user_result[1];
                if (password_verify($password_request, $user_password)) {
                    echo true;
                    return true;
                } else {
                    echo false;
                    return false;
                }
            }
            else {
                echo false;
                return false;
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo $e;
            return false;
        }
    }

    /**
     * Stores new user information in the database
     *
     * @return bool
     */
    function store($request): bool
    {
        # Hash password
        $userModel = new UserModel();
        $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        try {
            $userModel->create($request);
        } catch (\Exception $e) {
            http_response_code(500);
            echo $e;
            return false;
        } finally {
            echo true;
            return true;
        }
    }
}

?>