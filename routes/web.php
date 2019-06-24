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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect('/books');
});
Route::put('/books/{id}/linkUser', 'BooksController@linkUser');
Route::put('/books/{id}/setAsAvailable', 'BooksController@setAsAvailable');
Route::post('/book_search', 'BooksController@filter');

Route::resource('categories', 'CategoriesController');
Route::resource('books', 'BooksController');

