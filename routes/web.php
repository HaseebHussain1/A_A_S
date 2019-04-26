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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::resource('users/Animals','AnimalController');

Route::resource('Adoptions','AdoptionController');


Route::get('users/Animals', 'AnimalController@index');/* user*/
Route::get('users/Animals/{Animal}', 'AnimalController@show');


Route::match(['put','patch'],'staff/Animals/{Animal}', 'AnimalController@update');
Route::get('staff/Animals', 'AnimalController@adminindex');
Route::get('staff/Animals/create', 'AnimalController@create');
Route::delete('staff/Animals/{Animal}', 'AnimalController@destroy');
Route::get('staff/Animals/{Animal}/edit ', 'AnimalController@edit');/* staff*/


Route::get('staff/Adoptions ', 'AnimalController@edit');

/*
/users/animals
/users/animals/id
/users/adoptions

*/



/*
/staff/animals
/staff/adoptions

*/


/*
/admin/users
*/
