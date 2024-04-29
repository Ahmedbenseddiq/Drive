<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', [guestController::class, 'welcome'])->name('welcome');
Route::get('/cars', [guestController::class, 'cars'])->name('cars');



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginpage'])->name('loginpage');
    Route::get('/register', [AuthController::class, 'registerpage'])->name('registerpage');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/restricted', [AuthController::class, 'restricted'])->name('restricted');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
}); 

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::put('admin/{userId}', [AdminController::class, 'restriction'])->name('restriction');
});

Route::middleware(['auth','role:operator'])->group(function (){
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
    Route::post('operator/car/storeCar', [CarController::class, 'store'])->name('operator.storeCar');
    Route::get('operator/car/editCar/{car}', [CarController::class, 'edit'])->name('operator.editCar');
    Route::put('operator/car/updateCar/{car}', [CarController::class, 'update'])->name('operator.updateCar');
    Route::delete('operator/car/destroycar/{car}', [carController::class, 'destroy'])->name('operator.destroycar');

});

Route::middleware(['auth','role:client'])->group(function (){
    Route::get('client/home', [ClientController::class, 'index'])->name('client.home');
    Route::get('client/cars', [ClientController::class, 'cars'])->name('client.cars');
    Route::get('client/singleCar/{carId}', [ClientController::class, 'singleCar'])->name('client.singleCar');
    Route::post('client/reservation/{carId}', [ReservationController::class, 'store'])->name('client.reservation');
    Route::get('client/cars/{category_id}', [ClientController::class, 'filterByCategory'])->name('client.filter');
    Route::get('client/reservationHistory', [ClientController::class, 'reservation'])->name('client.reservationHistory');
    Route::post('client/{car}/like', [LikeController::class, 'like'])->name('client.like');
    Route::delete('client/{car}/unlike', [LikeController::class, 'unlike'])->name('client.unlike');
});