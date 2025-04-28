<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,"view"]);

Route::get('/chemistry', [SubjectController::class,"view"]);
Route::get('/informatics', [SubjectController::class,"view"]);
Route::get('/physics', [SubjectController::class,"view"]);

Route::get('/admin', [AdminController::class,"view"]);
Route::get('/subject', [SubjectController::class,"createSubject"]);
Route::get('/topic', [TopicController::class,"createTopic"]);