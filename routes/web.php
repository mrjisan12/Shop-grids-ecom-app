<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/category/add',[CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/manage',[CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::post('/sub-category/create',[SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category/manage',[SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class, 'delete'])->name('sub-category.delete');



});
