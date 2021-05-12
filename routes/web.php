<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
	return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resources([
	'posts' => App\Http\Controllers\PostController::class,
	'roles' => App\Http\Controllers\RoleController::class,
	'permissions' => App\Http\Controllers\PermissionController::class,
	'users' => App\Http\Controllers\UserController::class,
]);

/* Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class); */

Auth::routes();