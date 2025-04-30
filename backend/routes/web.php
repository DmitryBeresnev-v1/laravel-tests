<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;


Route::get('/', function () {
    return view('welcome');
});
//Клиентская часть
Route::get('/dashboard', [DashboardController::class,"view"]);

Route::get('/{name}', [SubjectController::class,"view"]);

//Админская чать
//Только залогиненные могут иметь возможность работать с темами и тестами
Route::get('/admin', [AdminController::class,"view"]);

Route::get('admin/create_topic', [TopicController::class,"create"]);
Route::get('admin/update_topic', [TopicController::class,"update"]);
Route::get('admin/delete_topic', [TopicController::class,"delete"]);

Route::get('admin/create_test', [TestController::class,"create"]);
Route::get('admin/update_test', [TestController::class,"update"]);
Route::get('admin/delete_test', [TestController::class,"delete"]);

Route::get('admin/view_topic', [TopicController::class,"index"]);
Route::get('admin/view_topic/{id}', [TopicController::class,"view"]);

//Только администратор должен иметь возможность создавать предметы/разделы
Route::get('admin/create_subject', [SubjectController::class,"create"]);
Route::get('admin/update_subject', [SubjectController::class,"update"]);
Route::get('admin/delete_subject', [SubjectController::class,"delete"]);

Route::get('admin/view_subject', [SubjectController::class,"view"]);