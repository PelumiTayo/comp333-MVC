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
     * @var string[]
     */
    protected $fillable;
    /**
     * Queries the information schema table and returns the columns for given table name
     *
     * @return string[]|bool
     */
    protected function getColumns() : array|bool {
        $query_string = "SELECT COLUMN_NAME, COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=? AND TABLE_NAME= ?";
        /** @var mysqli $db
         *  @var string $DB_DATABASE
         */
        if ($result = $db->execute_query($query_string, [$DB_DATABASE, $this->table_name])) {
            return $result->fetch_all();
        }
        else {
            return false;
        }
    }
    /**
     * Creates new entry into the database. Returns true if successful, false otherwise.
     *
     * @param string[] $entries
     * @return bool
     */
    public function create(array $entries) : bool {
        # check if $fillable is in $rows
        $columns = $this->getColumns();
        foreach ($entries as $field) {
            foreach ($columns as $column) {
                if ($field[0] == $column[0]) {
                    break;
                }
                return false;
            }
        }
        # convert entries into string
        $array_fields = array();
        $array_values = array();
        foreach ($entries as $field) {
            $array_fields[] = array_search($field, $entries);
            $array_values[] = "'".$field."'";
        }
        $fields = implode(',',$array_fields);
        $values = implode(',',$array_values);
        # query string would be INSERT INTO table_name (?,?)
        $query_string = "INSERT INTO $this->table_name ($fields) VALUES ($values)";
        /** @var mysqli $db */
        if ($db->execute_query($query_string)) {
            return true;
        }
        else return false;
    }
    /**
     * Queries the database for the provided entries and returns the query result as an array
     *
     * @param array $entries
     * @return array
     */
    public function retrieve(array $entries) : array {
        $search_values = array();

        foreach ($entries as $entry) {
            $search_values[] = array_search($entry, $entries).'='."'".$entry."'";
        }
        $keywords = implode(' AND ', $search_values);

        $query_string = "SELECT * FROM $this->table_name WHERE $keywords";
        /** @var mysqli $db */
        if ($results = $db->execute_query($query_string)) {
            return $results->fetch_all();
        }
        else return array();
    }
    /**
     * Queries the database with $identity and updates the values with the given $update. Returns true if query was successful, false otherwise.
     *
     * @param array $update
     * @param array $identity
     * @return bool
     */
    public function update(array $update, array $identity) : bool {
        $update_values = array();
        $search_values = array();
        # Extract query values from array $update to strings
        foreach ($update as $key) {
            $update_values[] = array_search($key, $update)."="."'".$key."'";
        }
        $update_keys = implode(',', $update_values);

        # Extract query values from array $identity to strings
        foreach ($identity as $key) {
            $search_values[] = array_search($key, $identity)."="."'".$key."'";
        }
        $search_keys = implode(' AND ', $search_values);

        $query_string = "UPDATE $this->table_name $update_keys WHERE $search_keys";

        /** @var mysqli $db */
        return $db->execute_query($query_string);
    }
    /**
     * Queries the database with $identity and deletes the entry that matches the given identifier. Returns true if query was successful, false otherwise
     *
     * @param array $identity
     * @return bool
     */
    public function delete(array $identity) : bool {
        $identity_values = array();
        
        foreach ($identity as $key) {
            $identity_values[] = array_search($key, $identity)."="."'".$key."'";
        }

        $identity_keys = implode(' AND ', $identity_values);

        $query_string = "DELETE FROM $this->table_name WHERE $identity_keys";

        /** @var mysqli $db */
        return $db->execute_query($query_string);
    }
}

?>