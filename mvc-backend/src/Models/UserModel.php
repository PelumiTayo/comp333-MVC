<?php

namespace src\Models;

class UserModel extends Model
{
    protected $table_name = 'user_table';
    protected $fillable = array(
        array(
            'field' => 'username',
            'type' => 'varchar(255)'),
        array(
            'field' => 'password',
            'type' => 'varchar(255)')
    );

}

?>