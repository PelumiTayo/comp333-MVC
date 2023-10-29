<?php

namespace src\Models;

use mysqli;

require_once '../db.php';

class Model
{
    /**
     * table name to query the database
     *
     * @var string
     */
    protected $table_name;
    /**
     * fillable fields for the model
     *
     * @var string|array
     */
    protected $fillable;

    /**
     * Queries the information schema table and returns the columns for given table name
     *
     * @return string[]|bool
     */
    protected function getColumns() : string|bool {
        $query_string = "SELECT COLUMN_NAME, COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='app_db' AND TABLE_NAME= ?";
        /** @var mysqli $db */
        if ($result = $db->execute_query($query_string, $this->table_name)) {
            return $result->fetch_all();
        }
        else {
            return false;
        }
    }

    /**
     * Creates new entry into the database
     *
     * @param string[] $entry
     * @return bool
     */
    public function create($entry) : bool {
        # check if $fillable is in $rows
        $columns = $this->getColumns();
        foreach ($this->fillable as $field) {
            foreach ($columns as $column) {
                if ($field[0] == $column[0]) {
                    break;
                }
                return false;
            }
        }
        # type match $fillables to $rows
        # query string would be INSERT INTO table_name (?,?)
    }
}

?>