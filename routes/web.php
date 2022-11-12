<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeerController;
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

// frontend routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/job-list', [JobController::class, 'index']);
Route::get('/job-details', [JobController::class, 'job_details']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog-details', [BlogController::class, 'blog_details']);
Route::get('/contact', [ContactController::class, 'index']);

// backend routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard');

// job category routes
Route::get('/dashboard/job-category', [JobCategoryController::class, 'index']);
Route::post('/dashboard/job-category/insert', [JobCategoryController::class, 'insert']);
Route::get('/dashboard/job-category/delete/{category_id}', [JobCategoryController::class, 'delete']);
Route::post('/dashboard/job-category/edit', [JobCategoryController::class, 'edit']);

// employers routes
Route::get('/dashboard/employer', [EmployeerController::class, 'index']);
Route::post('/dashboard/employer/insert', [EmployeerController::class, 'insert']);
Route::get('/dashboard/employer/delete/{employer_id}', [EmployeerController::class, 'delete']);
Route::post('/dashboard/employer/edit', [EmployeerController::class, 'edit']);


