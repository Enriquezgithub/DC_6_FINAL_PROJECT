<?php

use App\Http\Controllers\Auth\LoginPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('WelcomePage');
})->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/landing', function () {
        return Inertia::render('LandingPage');
    })->name('landing');


    Route::get('/list', [LoginPageController::class, 'index']);
    Route::get('/users/{user}/edit', [LoginPageController::class, 'edit']);
    Route::put('/users/{user}', [LoginPageController::class, 'update']);
    Route::delete('/users/{user}', [LoginPageController::class, 'delete']);
});

Route::get('/loginPage', function () {
    return Inertia::render('Auth/LoginPage');
})->name('loginPage');

Route::post('/loginPage', [LoginPageController::class, 'store'])->name('loginPage.post');
Route::post('/logout', [LoginPageController::class, 'destroy'])->name('logout');

Route::get('/registerPage', function () {
    return Inertia::render('RegisterPage');
});

Route::post('/registerPage', [LoginPageController::class, 'register'])->name('register.post');



// Route::get(
//     '/',
//     function () {
//         return Inertia::render('WelcomePage');
//     }
// )->name('welcome');


// Route::group(
//     ['middleware' => 'auth'],
//     function () {

//         Route::get('/landing', function () {
//             return Inertia::render('LandingPage');
//         })->name('landing');
//     }
// );

// Route::get(
//     '/loginPage',
//     function () {
//         return Inertia::render('Auth/LoginPage');
//     }
// )->name('loginPage');


// Route::post('/loginPage', [LoginPageController::class, 'store'])->name('loginPage.post');
// Route::post('/logout', [LoginPageController::class, 'destroy'])->name('loginPage.destroy');


// require __DIR__ . '/auth.php';
