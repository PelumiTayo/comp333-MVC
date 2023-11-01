<?php

namespace src\Controllers;
use src\Models\RatingModel;

require_once 'BaseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Models/RatingModel.php';

class RatingController extends BaseController
{
    function show() {
        $ratingModel = new RatingModel();
        $result = $ratingModel->retrieve();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    function store(array $request) {
        $ratingModel = new RatingModel();

        try {
            $rows = $ratingModel->retrieve(array('username' => $request['username'], 'title' => $request['title']));
            if (count($rows) > 0) {
                echo "duplicate";
                return false;
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo $e;
            return false;
        }

        try {
            if ($ratingModel->create($request)) {
                echo true;
                return true;
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

    function update($request) {
        $ratingModel = new RatingModel();
        try {
            if ($ratingModel->update($request,array('id'=>$request['id']) )){
                echo true;
                return true;
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

    function delete() {

    }
}

