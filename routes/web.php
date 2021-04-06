<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/cv', function () {
    return view('index');
}); 

Route::get('post', [App\Http\Controllers\PostController::class, 'index']);
Route::get('post/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('post/store',[App\Http\Controllers\PostController::class,'store'])->name('add-post');


Route::get('blog', [BlogController::class, 'index']);
// Route::get('blog/create', function(){
//     return view('blog');
// });
Route::get('blog/create', [BlogController::class, 'create']);
Route::post('blog/store',[BlogController::class,'store'])->name('add-blog');

Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'get_post']);
