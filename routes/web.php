<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\User\PartsController as UserPartsController;
use App\Http\Controllers\Admin\PartsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ManufactureController;
use App\Http\Controllers\Admin\OrderController;

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
    Route::get('login', [\App\Http\Controllers\AuthController::class, 'show']);
});

Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\AuthController::class, 'show'])->name('login');
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'auth'])->name('auth');
});

Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':' . \App\Models\User::ROLE_USER])->group(function () {
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::get('logout', \App\Http\Controllers\LogoutAction::class)->name('logout');
    Route::get('user/password-change', [\App\Http\Controllers\PasswordChangeController::class, 'show'])->name('user.password_change');
    Route::post('user/password-change', [\App\Http\Controllers\PasswordChangeController::class, 'change'])->name('user.password_change_submit');
});

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'show'])->name('register.index');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');

Route::get('password-reset', [\App\Http\Controllers\PasswordRemindController::class, 'show'])->name('password_reminder.show');
Route::post('password-reset', [\App\Http\Controllers\PasswordRemindController::class, 'send'])->name('password_reminder.send');

Route::get('password-reset/{email}/{token}', [\App\Http\Controllers\PasswordRemindController::class, 'changePassword'])->name('password_reminder.change');
Route::post('password-reset/{email}/{token}', [\App\Http\Controllers\PasswordRemindController::class, 'submit'])->name('password_reminder.submit');

Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':' . \App\Models\User::ROLE_ADMIN])->group(function () {
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

    Route::get('/admin/orders', [OrderController::class, 'list'])->name('admin.order.list');
    Route::get('/admin/order/show/{order}', [OrderController::class, 'show'])->name('admin.order.show');

});

// Route::get('/part-list',[UserPartsController::class,'list'])->name('app.part-list');
