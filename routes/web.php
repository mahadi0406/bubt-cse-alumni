<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::view('/signup', 'signup')->name('signup');
Route::post('/signup', [AuthController::class, 'register']);
Route::get('/user/{id}/profile', [AuthController::class, 'guestProfile'])->name('guest.profile');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/job/details/{id}', [DashboardController::class, 'jobDetail'])->name('job.detail');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/personal', [AuthController::class, 'updatePersonalInfo'])->name('profile.personal');
    Route::post('/profile/password', [AuthController::class, 'changePassword'])->name('profile.password');
    Route::post('/profile/professional', [AuthController::class, 'updateProfessionalInfo'])->name('profile.professional');
    Route::post('/profile/contacts', [AuthController::class, 'updateContacts'])->name('profile.contacts');
    Route::get('/users/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('users/{id}/{status}', [UserController::class, 'changeStatus'])->name('user.status');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/api/companies', [CompanyController::class, 'store'])->name('api:company.store');
    Route::get('/members/request', [DashboardController::class, 'getMemberRequests'])->name('members.request');
    Route::get('/members/referrals', [DashboardController::class, 'getReferral'])->name('members.referral');
    Route::get('/members/{id}/{status}', [DashboardController::class, 'refererChangeStatusPage'])->name('member.status.change');
    Route::post('/members/{id}/{status}', [DashboardController::class, 'refererChangeStatus'])->name('member.status.change.submit');


    Route::prefix('jobs')->name('jobs.')->group(function() {
        Route::get('/', [JobController::class, 'index'])->name('index');
        Route::get('/create', [JobController::class, 'create'])->name('create');
        Route::post('/store', [JobController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [JobController::class, 'update'])->name('update');
    });
});


Route::get('/', function () {
    return view('home');

})->name('index');


