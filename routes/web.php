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
Route::get('/',function(){
    return view('question/index');
})->name('index');

Route::get('/tutorial',function(){
    return view('tutorial');
})->name('tutorial');

Route::get('/test',function(){
    return view('test');
})->name('test');

Route::get('/blog',function(){
    return view('blog');
})->name('blog');

Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/contact',function(){
    return view('contact');
 })->name('contact');

// Route::get('','QuestionController@index')->name('index');

Route::get('/','QuestionController@index')->name('question.index');
Route::resource('/question','QuestionController')->except('index')->middleware('auth');


Route::resource('/question/{question}/answer', 'AnswerController');
Route::post('/answer/{answer}/like','LikeController@like')->name('like');
Route::post('/answer/{answer}/unlike','LikeController@unlike')->name('unlike');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
