<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\JobCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Auth::routes();

// clients routes
Route::get('/', [HomeController::class, 'index']);

// admin routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard');
Route::get('/dashboard/job-category', [JobCategoryController::class, 'index']);
Route::post('/dashboard/job-category/insert', [JobCategoryController::class, 'insert']);
Route::get('/dashboard/job-category/delete/{category_id}', [JobCategoryController::class, 'delete']);
Route::post('/dashboard/job-category/edit', [JobCategoryController::class, 'edit']);
