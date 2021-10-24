<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

//Auth Controller
require __DIR__.'/auth.php';

//Home Controller
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/about', [HomeController::class, 'about'])
    ->name('about');

Route::get('/services', [HomeController::class, 'services'])
    ->name('services');

Route::get('/welcome', [HomeController::class, 'welcome'])
    ->name('welcome');

Route::get('/user/home', [HomeController::class, 'userHome'])
    ->name('user.home');

Route::get('/admin/home', [HomeController::class, 'adminHome'])
    ->middleware(['auth'])->name('admin.home');

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth'])->name('dashboard');

//User Controller
Route::get('/user', [UserController::class, 'index'])
    ->name('user');

Route::post('/user/store', [UserController::class, 'store'])
    ->name('user.store');

Route::post('/user/update', [UserController::class, 'update'])
    ->name('user.update');

Route::post('/user/delete', [UserController::class, 'delete'])
    ->name('user.delete');

Route::post('/user/getInLine', [UserController::class, 'getInLine'])
    ->name('user.getInLine');

Route::post('/user/topUp', [UserController::class, 'topUp'])
    ->name('user.topUp');

//Company Controller
Route::get('/company', [CompanyController::class, 'index'])
    ->name('company');

Route::post('/company/store', [CompanyController::class, 'store'])
    ->name('company.store');

Route::post('/company/update', [CompanyController::class, 'update'])
    ->name('company.update');

Route::post('/company/delete', [CompanyController::class, 'delete'])
    ->name('company.delete');

Route::post('/company/receptionist/add', [CompanyController::class, 'addReceptionist'])
    ->name('company.receptionist.add');

Route::post('/company/receptionist/update', [CompanyController::class, 'updateReceptionist'])
    ->name('company.receptionist.update');

Route::post('/company/receptionist/delete', [CompanyController::class, 'deleteReceptionist'])
    ->name('company.receptionist.delete');

Route::post('/company/nextPerson', [CompanyController::class, 'nextPerson'])
    ->name('company.nextPerson');


