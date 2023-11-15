<?php

use App\Http\Controllers\Api\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(StudentsController::class)->group(function () {
        Route::get('/student',                 'index');
        Route::get('/student/{id}',            'show');
        Route::post('/student',                'store')->name('student.store');     // Student Registration
        // Route::put('/student/{id}',            'update')->name('student.update');
        // Route::put('/student/email/{id}',      'email')->name('student.email');
        // Route::put('/student/password/{id}',   'password')->name('student.password');
        // Route::put('/user/image/{id}',      'image')->name('user.image');
        Route::delete('/student/{id}',         'destroy');
});
