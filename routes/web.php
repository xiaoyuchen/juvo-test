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
    return view('welcome');
});

//get album data
Route::get('/albumdata', [
    'as' => 'albumdata', 'uses' => 'AlbumController@albumsData'
]);

//get photos by album id 
Route::get('/photodata/{albumid}', [
    'as' => 'photodata', 'uses' => 'AlbumController@photosData'
]);

//route to album list view
Route::get('/albumlist', [
    'as' => 'albumlist', 'uses' => 'AlbumController@albumList'
]);

//route to photo list view
Route::get('/photolist/{albumid}', [
    'as' => 'photolist', 'uses' => 'AlbumController@photoList'
]);