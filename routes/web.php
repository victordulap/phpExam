<?php

use App\Http\Controllers\AddCar;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Clients;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// problem
Route::get('/register', function () {
    return route('register');
})->middleware('admin');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/seller', function () {
    return view('seller');
})->middleware('seller');

Route::get('/seller/add-car', function () {
    return view('add-car');
})->middleware('seller');

Route::post('/add-car', [AddCar::class, 'index'])->middleware('seller');

Route::get('/cars', [Cars::class, 'index']);

Route::get('/sell-car', [Cars::class, 'getCarsForSelling'])->middleware('seller');

Route::get('/sold-cars', [Cars::class, 'getSoldCars'])->middleware('seller');

Route::get('/available-cars', [Cars::class, 'getAvailableCars'])->middleware('seller');

Route::get('/all-cars', [Cars::class, 'getAllCars'])->middleware('seller');

Route::get('/sell-car/{id}', [Cars::class, 'sell'])->middleware('seller');

Route::get('/sell-car-new/{id}', [Cars::class, 'sellToNewClient'])->middleware('seller');

Route::post('/sell-car-new-complete', [Cars::class, 'sellToNewClientComplete'])->middleware('seller');

Route::get('/sell-car-old/{id}', [Cars::class, 'sellToOldClient'])->middleware('seller');

Route::get('/sell-car-old-client-complete/{carId}/{clientId}', [Cars::class, 'sellToOldClientComplete'])->middleware('seller');

Route::get('/clients', [Clients::class, 'getClients'])->middleware('seller');

Route::get('/client/{id}', [Clients::class, 'getClientById'])->middleware('seller');



Route::get('/admin/add-seller', function () {
    return redirect('/register');
})->middleware('admin');
