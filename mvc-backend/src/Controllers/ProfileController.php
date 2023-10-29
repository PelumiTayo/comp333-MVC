<?php

namespace src\Controllers;

use Couchbase\User;
use src\Models\UserModel;
class ProfileController extends BaseController
{
    # Maybe this could live in BaseController...
    function store() {
        $user = new UserModel;
        $user->getTable();

        # Some SQL statement to push new model to database
    }
}

?>