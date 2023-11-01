<?php

namespace src\Controllers;
use src\Models\RatingModel;

require_once 'BaseController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Models/RatingModel.php';

class RatingController extends BaseController
{
    public function __construct()
    {
        $this->model = new RatingModel();
    }

    /**
     * @return null
     */
    function show(): null  {
        $result = $this->model->retrieve();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        return;
    }

    /**
     * @param array $request
     * @return bool
     */
    function store(array $request): bool {

        try {
            $rows = $this->model->retrieve(array('username' => $request['username'], 'title' => $request['title']));
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
            if ($this->model->create($request)) {
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

    /**
     * @param array $request
     * @return bool
     */
    function update(array $request): bool{
        try {
            if ($this->model->update($request,array('id'=>$request['id']) )){
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

    /**
     * @param array $request
     * @return bool
     */
    function delete(array $request): bool {
        try {
            if ($this->model->delete($request)){
                echo true;
                return true;
            }
            else{
                echo false;
                return false;
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo $e;
            return false;
        }
    }
}

