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
    Route::get('admin/question/{game}/{ques_id}',[Users::class, 'question_edit']);
    Route::post('admin/question/{game}/{ques_id}',[Users::class, 'question_update']);
    Route::get('admin/question/delete/{game}/{ques_id}',[Users::class, 'question_delete']);
    Route::view('join','join');
    Route::get('admin/library',[Users::class, 'library']);
    Route::get('admin/question/{game}',[Users::class, 'read_question']);
    Route::post('admin/question/{game}',[Users::class, 'save_question']);
    Route::get('profile',[Users::class, 'profile']);
    Route::post('update',[Users::class, 'update']);

});
Route::get('logout',[Users::class,'logout']);



