<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is for your central application routes. These routes are
| not tenant-specific. All authenticated routes should be in routes/tenant.php.
|
*/

Route::get('/', function () {
    return view('welcome');
});
