<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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
Auth::routes();
    Route::get('/', function () {
        return  redirect('/login');
    })->middleware('auth');
   
    Route::get('/todos', 'TodosController@user');
    Route::post('/todoss', 'TodosController@store');
    Route::get('/todoshow', 'TodosController@index');
    Route::get('/todoshowuser', 'TodosController@user');
    
    Route::get('/todos/create', 'TodosController@create');
    Route::get('/todos/{id}', 'TodosController@show');
    Route::get('/todoss/{id}/edit', 'TodosController@edit');
    Route::get('/todos/{id}/edit', 'TodosController@edituser');
    Route::patch('/todoss/{id}', 'TodosController@update');
    Route::patch('/todos/{id}', 'TodosController@updateuser');
    Route::get('/todoss/{id}', 'TodosController@destroy')->name('del');
    
    
    
    Route::get('/home', 'HomeController@index')->name('home');
    

