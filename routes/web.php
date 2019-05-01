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

//Route::resource('Adoptions','AdoptionController');


Route::get('users/Animals', 'AnimalController@index');
Route::get('users/Animals/{Animal}', 'AnimalController@show');
Route::get('users/Adoptions/{User}', 'AnimalController@showuseradoptions');
Route::post('users/Adoptions', 'AdoptionController@store');


Route::match(['put','patch'],'staff/Animals/{Animal}', 'AnimalController@update');
Route::get('staff/Animals', 'AnimalController@staffindex');// s4
Route::get('staff/Animals/create', 'AnimalController@create');
Route::get('staff/Animals/{Animal}', 'AnimalController@staffshow');
Route::delete('staff/Animals/{Animal}', 'AnimalController@destroy');// not being used yet
Route::get('staff/Animals/{Animal}/edit', 'AnimalController@edit');
Route::post('staff/Animals', 'AnimalController@store');


Route::match(['put','patch'],'staff/Adoptions{Adoption}', 'AdoptionController@update');
Route::get('staff/Adoptions', 'AdoptionController@index');//s1


Route::get('staff/alladoptions', 'AdoptionController@alladoptions');

Route::get('logout', 'AdoptionController@index');
Route::get('admin/allusers', 'UserController@showallusers');
Route::patch('admin/updateuser/{User}', 'UserController@changeusertype');
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
