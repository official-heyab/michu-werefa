<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\ReceptionistHomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\MailController;

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

//User home controller
Route::get('/user', [UserHomeController::class, 'index'])
    ->middleware(['auth'])->name('user.home');

Route::get('/user/profile', [UserHomeController::class, 'profile'])
    ->middleware(['auth'])->name('user.profile');


//Receptionist home controller
Route::get('/receptionist', [ReceptionistHomeController::class, 'index'])
    ->middleware(['auth'])->name('receptionist.home');

Route::get('/receptionist/queue', [ReceptionistHomeController::class, 'queue'])
    ->middleware(['auth'])->name('receptionist.queue');


//Admin Controller
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth'])->name('admin.home');

Route::get('/admin/home', [AdminController::class, 'index'])
    ->middleware(['auth'])->name('admin.home');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/admin/companyCategories', [AdminController::class, 'companyCategories'])
    ->middleware(['auth'])->name('admin.companyCategories');

Route::get('/admin/advertisements', [AdminController::class, 'advertisements'])
    ->middleware(['auth'])->name('admin.advertisements');

Route::get('/admin/companies', [AdminController::class, 'companies'])
    ->middleware(['auth'])->name('admin.companies');

Route::get('/admin/companyBranches', [AdminController::class, 'companyBranches'])
    ->middleware(['auth'])->name('admin.companyBranches');

Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware(['auth'])->name('admin.users');

Route::get('/admin/receptionists', [AdminController::class, 'receptionists'])
    ->middleware(['auth'])->name('admin.receptionists');

Route::get('/admin/admins', [AdminController::class, 'admins'])
    ->middleware(['auth'])->name('admin.admins');


//User Controller
Route::post('/user/store', [UserController::class, 'store'])
    ->middleware(['auth'])->name('user.store');

Route::post('/user/update', [UserController::class, 'update'])
    ->middleware(['auth'])->name('user.update');

Route::post('/user/delete', [UserController::class, 'delete'])
    ->middleware(['auth'])->name('user.delete');

Route::post('/user/getInLine', [UserController::class, 'getInLine'])
    ->name('user.getInLine');

Route::post('/user/topUp', [UserController::class, 'topUp'])
    ->middleware(['auth'])->name('user.topUp');


//Company Category Controller
Route::post('/companyCategory/store', [CompanyCategoryController::class, 'store'])
    ->middleware(['auth'])->name('companyCategory.store');

Route::post('/companyCategory/update', [CompanyCategoryController::class, 'update'])
    ->middleware(['auth'])->name('companyCategory.update');

Route::post('/companyCategory/delete', [CompanyCategoryController::class, 'delete'])
    ->middleware(['auth'])->name('companyCategory.delete');

//Advertisement Controller
Route::post('/advertisement/store', [AdvertisementController::class, 'store'])
    ->middleware(['auth'])->name('advertisement.store');

Route::post('/advertisement/update', [AdvertisementController::class, 'update'])
    ->middleware(['auth'])->name('advertisement.update');

Route::post('/advertisement/delete', [AdvertisementController::class, 'delete'])
    ->middleware(['auth'])->name('advertisement.delete');


//Company Controller
Route::post('/company/store', [CompanyController::class, 'store'])
    ->middleware(['auth'])->name('company.store');

Route::post('/company/update', [CompanyController::class, 'update'])
    ->middleware(['auth'])->name('company.update');

Route::post('/company/delete', [CompanyController::class, 'delete'])
    ->middleware(['auth'])->name('company.delete');


//Company Branch Controller
Route::post('/companyBranch/store', [CompanyBranchController::class, 'store'])
    ->middleware(['auth'])->name('companyBranch.store');

Route::post('/companyBranch/update', [CompanyBranchController::class, 'update'])
    ->middleware(['auth'])->name('companyBranch.update');

Route::post('/companyBranch/delete', [CompanyBranchController::class, 'delete'])
    ->middleware(['auth'])->name('companyBranch.delete');


//Receptionist Controller
Route::post('/receptionist/store', [ReceptionistController::class, 'store'])
    ->middleware(['auth'])->name('receptionist.store');

Route::post('/receptionist/delete', [ReceptionistController::class, 'delete'])
    ->middleware(['auth'])->name('receptionist.delete');

Route::post('/receptionist/nextPerson', [ReceptionistController::class, 'nextPerson'])
    ->middleware(['auth'])->name('receptionist.nextPerson');


//Mail controller
Route::get('sendbasicemail', [MailController::class, 'basic_email']);
Route::get('sendhtmlemail', [MailController::class, 'html_email'] );
Route::get('sendattachmentemail', [MailController::class, 'attachment_email']);
Route::get('testemail', [MailController::class, 'testemail']);

Route::post('submitcontact', [MailController::class, 'contactus']);

