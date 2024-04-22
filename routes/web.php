<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperatorController;

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


Route::get('/login', [AuthController::class, 'loginpage'])->name('loginpage');
Route::get('/register', [AuthController::class, 'registerpage'])->name('registerpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('client/home', [ClientController::class, 'index'])->name('client.home');

Route::get('operator/home', [OperatorController::class, 'index'])->name('operator.home');

Route::get('operator/category/categories', [CategoryController::class, 'index'])->name('operator.categories');
Route::get('operator/category/addCategory', [CategoryController::class, 'create'])->name('operator.addCategory');
Route::post('operator/category/storeCategory', [CategoryController::class, 'store'])->name('operator.storeCategory');
Route::get('operator/category/editCategory/{category}', [CategoryController::class, 'edit'])->name('operator.editCategory');
Route::put('operator/category/updateCategory/{category}', [CategoryController::class, 'update'])->name('operator.updateCategory');
Route::delete('operator/category/destroyCategory/{category}', [CategoryController::class, 'destroy'])->name('operator.destroyCategory');

Route::get('operator/carInfo/carInfo', [CarInfoController::class, 'index'])->name('operator.carInfo');
Route::get('operator/carInfo/addCarInfo', [CarInfoController::class, 'create'])->name('operator.addCarInfo');
Route::post('operator/carInfo/storeCarInfo', [CarInfoController::class, 'store'])->name('operator.storeCarInfo');
Route::get('operator/carInfo/editCarInfo/{carDetail}', [CarInfoController::class, 'edit'])->name('operator.editCarInfo');
Route::put('operator/carInfo/updateCarInfo/{carDetail}', [CarInfoController::class, 'update'])->name('operator.updateCarInfo');
Route::delete('operator/carInfo/destroyCarInfo/{carDetail}', [CarInfoController::class, 'destroy'])->name('operator.destroyCarInfo');


Route::get('operator/car/cars', [CarController::class, 'index'])->name('operator.cars');
Route::get('operator/car/addCar', [CarController::class, 'create'])->name('operator.addCar');


