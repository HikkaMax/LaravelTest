<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/owners', 'MainController@owners');
Route::get('/owners/id={id}', 'MainController@owner');
Route::get('/ownersByFactories/factoryId={factoryId}', 'MainController@ownersByFactories');
Route::get('/factoriesByOwners/ownerId={ownerId}', 'MainController@factoriesByOwners');
Route::get('/tankersByFactories/factoryId={factoryId}', 'MainController@tankersByFactories');
Route::put('/factory', 'MainController@addFactory');

