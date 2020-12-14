<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

//pregled svih unesenih studenata
Route::get('index', 'App\Http\Controllers\StudentController@index')->name('index');

//pregled samo jednog studenta
Route::get('show/{id}', 'App\Http\Controllers\StudentController@show')->name('show');

//rute za unos studenta u bazu
Route::get('create-student', 'App\Http\Controllers\StudentController@create')->name('create-student');
Route::post('create', 'App\Http\Controllers\StudentController@store')->name('create');

//rute za izmjene podataka za studenta
Route::get('update-student/{id}', 'App\Http\Controllers\StudentController@edit')->name('update-student');
Route::post('update', 'App\Http\Controllers\StudentController@update')->name('update');

//rute za za brisanje studenta
Route::get('delete-student.{id}', 'App\Http\Controllers\StudentController@delete')->name('delete');
