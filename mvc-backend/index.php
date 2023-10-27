<?php

require_once __DIR__ . '/src/Route.php';

# Examples of using the Route class (not implemented)
Route::get('/login', './routes/login.php')->middleware(['auth']);

Route::post('/login', './routes/login.php')->middleware(['auth']);
