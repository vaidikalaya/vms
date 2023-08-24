<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\StudentsController;

Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/',function(){
    return redirect('/dashboard');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard','index')->name('home');
});

Route::controller(StudentsController::class)->group(function () {
    Route::get('/student/registration','studentRegistrationView')->name('student.registration');
});