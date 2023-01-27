<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies/', [MovieController::class, 'index']);
Route::get('/movies/{id}/', [MovieController::class, 'detail']);
Route::get('/sheets', [SheetController::class, 'index']);
Route::group(['prefix' => 'admin/movies'], function () {
    Route::get('/', [MovieController::class, 'adminIndex']);
    Route::get('/create', [MovieController::class, 'create']);
    Route::post('/store', [MovieController::class, 'store']);
    Route::get('/{id}', [MovieController::class, 'adminDetail']);
    Route::get('/{id}/edit', [MovieController::class, 'edit']);
    Route::patch('/{id}/update', [MovieController::class, 'update']);
    Route::delete('/{id}/destroy', [MovieController::class, 'destroy']);
    Route::get('/{id}/schedules/create', [ScheduleController::class, 'create']);
    Route::post('/{id}/schedules/store', [ScheduleController::class, 'store']);
});

Route::group(['prefix' => 'admin/schedules'], function () {
    Route::get('/', [ScheduleController::class, 'adminIndex']);
    Route::get('/{id}', [ScheduleController::class, 'adminDetail']);
    Route::get('/{id}/edit/', [ScheduleController::class, 'edit']);
    Route::patch('/{id}/update/', [ScheduleController::class, 'update']);
    Route::delete('/{id}/destroy', [ScheduleController::class, 'destroy']);
});