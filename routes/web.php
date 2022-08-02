<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PartsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ManufactureController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/parts', [PartsController::class, 'list'])->name('admin.parts.list');
Route::match(['get','post'],'admin/parts/create', [PartsController::class, 'create'])->name('admin.parts.create');
Route::get('/admin/part/{id}', [PartsController::class, 'show'])->name('admin.part.show');
Route::match(['get','post'],'/admin/part/edit/{part}', [PartsController::class, 'edit'])->name('admin.part.edit');
Route::delete('/admin/image/delete/{image}', [PartsController::class, 'deleteImage'])->name('admin.image.destroy');
Route::delete('/admin/part/delete/{part}', [PartsController::class, 'destroy'])->name('admin.part.destroy');

Route::get('/admin/category', [CategoryController::class, 'list'])->name('admin.category.list');
Route::match(['get','post'],'/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::get('/admin/category/show/{category}', [CategoryController::class, 'show'])->name('admin.category.view');
Route::match(['get','post'],'/admin/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::delete('/admin/category/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/admin/cars', [CarController::class, 'list'])->name('admin.cars.list');
Route::match(['get','post'],'/admin/car/create', [CarController::class, 'create'])->name('admin.car.create');
Route::match(['get','post'],'/admin/car/edit/{car}', [CarController::class, 'edit'])->name('admin.car.edit');
Route::delete('/admin/car/delete/{car}', [CarController::class, 'destroy'])->name('admin.car.destroy');

Route::get('/admin/manufactures', [ManufactureController::class, 'list'])->name('admin.manufacture.list');
Route::match(['get','post'],'/admin/manufacture/create', [ManufactureController::class, 'create'])->name('admin.manufacture.create');
Route::delete('/admin/manufacture/delete/{manufacture}', [ManufactureController::class, 'destroy'])->name('admin.manufacture.destroy');
