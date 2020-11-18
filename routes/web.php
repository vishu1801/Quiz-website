<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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
Route::group(['middleware'=>"web"], function(){
    Route::view('register','register');
    Route::post("register", [Users::class,'register']);
    Route::view('login','login');
    Route::post('login',[Users::class,'login']);
    Route::view('admin','admin\create');
    Route::view('admin/create','admin\create');
    Route::post('admin/create',[Users::class, 'create_quiz']);
    Route::view('join','join');
    Route::get('admin/library',[Users::class, 'library']);
});
Route::get('logout',[Users::class,'logout']);



