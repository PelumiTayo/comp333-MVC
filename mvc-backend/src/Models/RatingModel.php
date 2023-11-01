<?php

namespace src\Models;
require_once "Model.php";
class RatingModel extends Model
{
    protected $table_name = 'ratings_table';

    protected $fillable = array(
        array(
            'field' => 'username',
            'type' => 'varchar(255)'),
        array(
            'field' => 'password',
            'type' => 'varchar(255)')
    );
}
