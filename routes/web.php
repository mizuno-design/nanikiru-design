<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

<<<<<<< HEAD
Route::get('/nanikiru', function () {
    return view('nanikiru');
});
=======
Route::get('/nanikiru','nanikiruController@index');
>>>>>>> 97151af37260850a0a22821f72b1117f877fbec0
