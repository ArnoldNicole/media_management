<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/download/{file}', 'GuestController@download');
Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),        
    ]);
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::prefix('user')->middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('/browse','GuestController@files')->name('browse');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
	Route::get('/dashboard', 'AdminController@index')->name('admin');
	Route::get('/files', 'AdminController@files')->name('files');
	// Route::get('/requests', 'AdminController@requests')->name('requests');
	Route::get('/users', 'AdminController@users')->name('users');


	//category routes
	Route::get('/createCategory','AdminController@newCategory')->name('category.create');
	Route::post('/createCategory','AdminController@createCategory')->name('category.save');
	Route::get('/file/categories','AdminController@categories')->name('category.list');
	Route::delete('/deleteCategories','AdminController@deleteCategory')->name('category.delete');

	//files routes
	Route::get('/createFile','AdminController@newFile')->name('files.create');
	Route::get('/createFileThumbail/{file}','AdminController@thumbnail')->name('add.thumbanil');
	Route::post('/saveFile','AdminController@saveFile')->name('file.create');
	Route::post('/saveThumbnail','AdminController@saveThumbanil')->name('save.thumbnail');
	Route::delete('/deleteFile','AdminController@deleteFile')->name('file.delete');

});
