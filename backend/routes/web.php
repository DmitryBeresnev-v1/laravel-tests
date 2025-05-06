<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});
//Клиентская часть
Route::get('/dashboard', [DashboardController::class,"view"]);
Route::get('/{name}', [SubjectController::class,"view"]);


//Админская чать
//Только залогиненные могут иметь возможность работать с темами и тестами
Route::get('/admin', [AdminController::class,"view"]);


Route::get('admin/topic', [TopicController::class,"index"]);                                    //Вывод всех тем клиента
Route::get('admin/topic/all', [AdminController::class,"index"]);                                //Вывод всех тем
//Route::get('admin/topic/{id}', [TopicController::class,"view"])->where('id','[0-9]+');          //Вывод конкретной темы

Route::get('admin/topic/create', [TopicController::class,"create"]);        //Форма создания темы
Route::get('admin/topic/edit', [TopicController::class,"edit"]);            //Форма изменения темы
Route::post('admin/topic/store', [TopicController::class,"store"]);         //Запись БД
Route::post('admin/topic/{id}/update', [TopicController::class,"update"]);  //Изменения БД
Route::get('admin/topic/{id}/delete', [TopicController::class,"destroy"]);  //Удаление БД


Route::get('admin/test', [TestController::class,"index"]);                  //Вывод всех тестов клиенту
Route::get('admin/test/create', [TestController::class,"create"]);          //Форма создания теста
Route::get('admin/test/edit', [TestController::class,"edit"]);              //Форма изменения теста
Route::post('admin/test/store', [TestController::class,"store"]);           //Запись БД
Route::post('admin/test/{id}/update', [TestController::class,"update"]);    //Изменения БД
Route::get('admin/test/{id}/delete', [TestController::class,"destroy"]);    //Удаление БД


//Только администратор должен иметь возможность создавать предметы/разделы
Route::get('admin/subject', [SubjectController::class,"index"]);                  //Вывод всех предметов/разделов клиенту
Route::get('admin/subject/create', [SubjectController::class,"create"]);          //Форма создания предметов/разделов
Route::get('admin/subject/edit', [SubjectController::class,"edit"]);              //Форма изменения предмета/раздела
Route::post('admin/subject/store', [SubjectController::class,"store"]);           //Запись БД
Route::post('admin/subject/{id}/update', [SubjectController::class,"update"]);    //Изменения БД
Route::get('admin/subject/{id}/delete', [SubjectController::class,"destroy"]);    //Удаление БД


//Создания визуала без функционала
Route::get('admin/topic/view', [TopicController::class,"view"]);