<?php
// routes/web.php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;


use App\Exports\SimpleExport;
use Maatwebsite\Excel\Facades\Excel;



// Blade page
Route::get('/userform', [UserController::class, 'view'])->name('users.form');

// DataTables AJAX data
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Other user operations
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/layout', function () {
    return view('layouts.indexe'); // make sure this Blade file exists
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/do_login', [LoginController::class, 'dologin'])->name('do_login');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.user');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard route (protected)
Route::get('/dashboard', function () {
    if (!Session::has('user_id')) {
        return redirect()->route('login');
    }
    return view('layouts.app');
})->name('dashboard');





// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
}); 


Route::get('/list_users',[UserController::class,'index'])->name('user.list_users');



Route::get('/master', function () {
    return view('layouts.Master'); // make sure this Blade file exists
});


Route::get('/img_form', function () {
    return view('form_img'); // make sure this Blade file exists
});


Route::post("/upload",[FormController::class,'upload'])->name('image_upload');



Route::get('generatepdf',[PDFController::class,'generatePDF']);


Route::get('/export-simple', function () {
    return Excel::download(new SimpleExport, 'simple_data.xlsx');
});


// Route::get('/profile', function () {
//     return view('profile_registration');
// });


// Route::middleware(['web'])->group(function () {

//     Route::get('/profile',[UserController::class,'user_profile'])->middleware('auth')->name('edit_profile');
// });




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }
        return view('layouts.app');
    })->name('dashboard');
    
    Route::get('/profile',[UserController::class,'user_profile'])->middleware('auth')->name('edit_profile');
});