<?php

use Illuminate\Support\Facades\Route;

Route::view('/hello' , 'hello');


Route::get('/' , [\App\Http\Controllers\IndexController::class, 'index']);


Route::view('/page/contact','pages.contact')->name('contact');


Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);


Route::get('/users/bind/{user}', [\App\Http\Controllers\UserController::class,'showBind']);



Route::redirect('/bad', '/good');


Route::resource('users_crud', \App\Http\Controllers\UserCrudController::class);


Route::group(['prefix'=>'dashboard'],function (){
    Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, 'index']);
    Route::post('/admin/post',[\App\Http\Controllers\Admin\IndexController::class, 'post']);
});


Route::group(['prefix'=>'security', 'middleware' => 'auth'],function (){
    Route::get('/admin/auth', [\App\Http\Controllers\Admin\IndexController::class, 'auth']);
});



require __DIR__ . '/default.php';
