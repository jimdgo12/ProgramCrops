<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\home\IndexController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\DiseaseController;

use App\Http\Controllers\CropsDiseaseController;
use App\Http\Controllers\informationSeedController;
use App\Http\Controllers\informationDiseaseController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticationSessionController;

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
//================== RUTAS PUBLICAS ========================

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/crop/{crop}', [IndexController::class, 'getCropInformation'])->name('informationCrop');
Route::get('/seeds/{crop}', [IndexController::class, 'getSeedsInformation'])->name('informationSeeds');
Route::get('/diseases/{crop}', [IndexController::class, 'getDiseasesInformation'])->name('informationDiseases');
Route::get('/fertilizers/{crop}', [IndexController::class, 'getFertilizersInformation'])->name('informationFertilizers');

Route::get('/pesticides/{crop}/{disease}', [IndexController::class, 'getPesticidesInformation'])->name('informationPesticides');

//================== RUTAS ADMIN ==========================
Route::get('/welcome', [AdminController::class, 'welcome'])->name('WelcomeAdmin');
Route::resource('/crops', CropsController::class);

//================= RUTAS DE SESIÓN =======================
Route::get('/login', [AuthenticationSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticationSessionController::class, 'store'])->name('start');
Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('save');
