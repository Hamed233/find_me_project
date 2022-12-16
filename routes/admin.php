<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Sections\SubSectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes();

// Check if user is login or not
Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

    // Route::get('/register', function () {
    //     return view('auth.register');
    // });
});

Route::resource('forget_password', ForgetPasswordController::class);

Route::get('reset_password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

//         //==============================dashboard============================
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //==============================Sections============================
        Route::resource('sections', SectionController::class);
        Route::resource('sub_sections', SubSectionController::class);

    }
);
