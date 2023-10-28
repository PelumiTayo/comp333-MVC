<?php

namespace src\Models;

class Model
{
    /**
     * fillable fields for the model
     *
     * @var string|array
     */
    protected $fillable;
    /**
     * Queries the database to return the columns from a table
     *
     * @return string|array
     */
    function getTables() {
        # query string would be something like SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
    }

    /**
     * Creates new entry into the database
     *
     * @return void
     */
    function create() {
        $columns = $this->getTables();
        # query string would be INSERT INTO table_name (?,?)
    }
}

?>