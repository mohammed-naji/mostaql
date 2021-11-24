<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/find-jobs', [SiteController::class, 'find_jobs'])->name('site.find_jobs');
Route::get('/job/{id}', [SiteController::class, 'job'])->name('site.job');

Route::prefix('employer')->name('employer.')->middleware('auth')->group(function() {
    Route::get('post-job', [SiteController::class, 'post_job'])->name('post_job');
    Route::post('post-job', [SiteController::class, 'post_job_submit']);
    Route::get('jobs', [SiteController::class, 'jobs'])->name('jobs');
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/jobs', [AdminController::class, 'jobs'])->name('jobs');
    Route::get('/jobs/delete/{id}', [AdminController::class, 'jobs_delete'])->name('jobs_delete');
    Route::get('/jobs/update/{id}/{status}', [AdminController::class, 'jobs_update'])->name('jobs_update');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

