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

Route::get('/', function () {
    return view('welcome');
});

//LOGIN
Route::get('/login', function(){
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('login');

})->name('login');

Route::post('/login', 'UserController@login');

//REGISTER
Route::get('/register', function(){
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('register');
});
Route::post('/register', 'UserController@register');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');

});

Route::middleware(['auth'])->group(function () {

   Route::get('/user', function(){
        return view('user');
   });

   Route::get('/dashboard', function(){
        return view('dashboard');
    });

   Route::get('/admin', function(){
        $role = Auth::user()->role;
        if($role != 'admin'){
            return 'kowe ora entuk mlebu bos';
        }
        return view('admin.index');
   });

    Route::get('lomba', 'LombaController@index');
    Route::get('lomba/add', 'LombaController@add');
    Route::post('lomba', 'LombaController@create');
    
    // Edit
    Route::get('lomba/{id}/edit', 'LombaController@edit');
    Route::post('lomba/{id}/edit', 'LombaController@update');

    // Delete
    Route::get('lomba/{id}/delete', 'LombaController@delete');
    Route::get('lomba/{id}/confirmDelete', 'LombaController@confirmDelete');
});



Route::get('lomba/{id}', 'LombaController@detail');