<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\ClassesController;

//use App\Http\Middleware\Superadmin;

//Клиентская часть
Route::get('/form1', [ClientController::class, 'form1']);
Route::get('/form2', [ClientController::class, 'form2']);

Route::get('/client', [ClientController::class, 'index']);
Route::get('/client/{nameSubject}', [ClientController::class, 'show']) -> name('client.subject');

//Только залогиненные могут иметь возможность работать с темами и тестами
Route::prefix('auth') -> controller(LoginController::class)
    -> group(function () {
            Route::get('/login', 'index') -> name('login');
            Route::post('/login', 'login');
            Route::get('/signout', 'signout') -> name('signout');
});

Route::prefix('admin') 
    -> middleware(['auth'])
    -> group(function () {
        Route::prefix('topic') -> controller(TopicController::class) -> whereNumber('topicId')
            -> group(function () {
                    Route::get('/', 'index');                               //Вывод всех тем клиента
                    Route::get('/all', [AdminController::class, 'show']);   //Вывод всех тем
                    Route::get('/{topicId}', 'show');                       //Вывод конкретной темы 

                    Route::get('/create', 'create');                                                 //Форма создания темы
                    Route::get('/{topicId}/test/create', [TestController::class, 'create']);         //Форма создания теста из темы
                    Route::get('/{topicId}/edit', 'edit');                                           //Форма изменения темы

                    Route::post('/', 'store')->name('topic.store');         //Запись БД
                    Route::put('/{topicId}', 'update');                     //Изменения БД
                    Route::delete('/{topicId}/delete', 'destroy');          //Удаление БД
        });

        Route::prefix('test') -> controller(TestController::class) -> whereNumber('testId')
            -> group(function () {
                    Route::get('/', 'index');                          //Вывод всех тестов клиенту
                    // Route::get('/{testId}', 'show');
                    Route::get('/create', 'create');                   //Форма создания теста
                    Route::get('/{testId}/edit', 'edit');              //Форма изменения теста

                    Route::post('/', 'store')->name('test.store');     //Запись БД
                    Route::put('/{testId}', 'update');                 //Изменения БД
                    Route::delete('/{testId}/delete', 'destroy');      //Удаление БД
        });

        // Только администратор имеет возможность создавать предмет
        Route::prefix('subject') -> controller(SubjectController::class) -> whereNumber('subjectId')
            //-> middleware(['admin'])
            -> group(function () {
                    Route::get('/', 'index');                          //Вывод всех предметов/разделов клиенту
                    // Route::get('/{subjectId}', 'show');
                    Route::get('/create', 'create');                   //Форма создания предметов/разделов
                    Route::get('/{subjectId}/edit', 'edit');           //Форма изменения предмета/раздела

                    Route::post('/', 'store')->name('subject.store');  //Запись БД
                    Route::put('/{subjectId}', 'update');              //Изменения БД
                    Route::delete('/{subjectId}/delete', 'destroy');   //Удаление БД
        });

        Route::prefix('users') -> controller(UsersController::class) -> whereNumber('usersId')
            //-> middleware(['admin'])
            -> group(function () {
                    Route::get('/', 'index');                          //Вывод всех предметов/разделов клиенту
                    // Route::get('/{usertId}', 'show');
                    Route::get('/create', 'create');                   //Форма создания предметов/разделов
                    Route::get('/{userId}/edit', 'edit');            //Форма изменения предмета/раздела

                    Route::post('/', 'store')->name('users.store');  //Запись БД
                    Route::put('/{userId}', 'update');               //Изменения БД
                    Route::delete('/{userId}/delete', 'destroy')->name('users.destroy');    //Удаление БД
        });
});

/*  -- Шпаргалка --

-> Маршрут
Route::get('your/path/here/{id}', 'function_name')->where('id','[0-9]+')->name('your.route.name');
Route::resources('your/path/here/', YourController::class); - автоматически генерирует сразу все CRUD 

-> Html переходы
href="/admin/topic" - переход по строгому пути ip:port/admin -> ip:port/admin/topic
href="admin/topic" - переход с добавлением ip:port/admin -> ip:port/admin/admin/topic
href="{{ route('your.route.name') }}" - переход по указанному имени маршрута 

-> Html формы
<form action="{{ route('your.route.name') }}" method="POST"> @csrf - для формы создания
<form action="{{ route('your.route.name') }}" method="POST"> @csrf @method('PUT/DELETE') - для формы изменения/удаления
*/