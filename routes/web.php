<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostController;


/* Route::get('/posts', function () {
    return view('posts.index');
}); */
Route::get('/home/{id}', function () {
    return view('layouts.app');
});
/* Route::get('/', 'UserController@showUsers'); */
Route::get('/users/create',[PublicController::class, 'createUser']);
Route::post('/users/create',[PublicController::class, 'saveUser'])->name('createuser');
Route::get('/admin/users',[UserController::class, 'showUsers'])->name('showusers');
Route::get('/admin/users/view/{id}',[UserController::class, 'viewUser'])->name('viewuser');
Route::post('/admin/users/update/{id}',[UserController::class, 'updateUser'])->name('updateuser');
Route::post('/admin/users/delete/{id}',[UserController::class, 'deleteUser'])->name('deleteuser');

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'signin'])->name('signin');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/posts',[PostController::class, 'showPosts'])->name('showposts');
Route::get('/posts/view/myposts',[PostController::class, 'showUserPosts'])->name('showuserposts');
Route::get('/posts/add',[PostController::class, 'createPost'])->name('createpost');
Route::post('/posts/add',[PostController::class, 'storePost'])->name('storepost');
Route::get('/posts/view/{id}',[PostController::class, 'showRecipe'])->name('showrecipe');
Route::post('/posts/view/myposts/delete/{id}',[PostController::class, 'deleteUserPosts'])->name('deleteuserposts');
Route::get('/posts/view/myposts/view/{id}',[PostController::class, 'updatePosts'])->name('updatepost');
Route::post('/posts/view/myposts/update/{id}',[PostController::class, 'updateUserPosts'])->name('updateuserpost');

Route::post('/posts/{id}',[PostController::class, 'createSavings'])->name('createsavings');
Route::get('/posts/savings',[PostController::class, 'viewSavings'])->name('viewsavings');
Route::post('/posts/savings/delete/{id}',[PostController::class, 'deleteSavings'])->name('deletesavings');