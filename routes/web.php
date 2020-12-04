<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

// Route::redirect('/', 'en');

// Route::group(['prefix' => '{locale}'], function(){



Route::get('/', function () {
    return view('welcome');
});
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

use App\Http\Controllers\LanguageController;

Route::group(['prefix' => 'languages'], function(){
   Route::get('', [LanguageController::class, 'index'])->name('language.index');
   Route::get('create', [LanguageController::class, 'create'])->name('language.create');
   Route::post('store', [LanguageController::class, 'store'])->name('language.store');
   Route::get('edit/{language}', [LanguageController::class, 'edit'])->name('language.edit');
   Route::put('update/{language}', [LanguageController::class, 'update'])->name('language.update');
   Route::post('delete/{language}', [LanguageController::class, 'destroy'])->name('language.destroy');
   Route::get('show/{language}', [LanguageController::class, 'show'])->name('language.show');
});


use App\Http\Controllers\AdController;

Route::group(['prefix' => 'ads'], function(){
   Route::get('', [AdController::class, 'index'])->name('ad.index');
   Route::get('create', [AdController::class, 'create'])->name('ad.create');
   Route::post('store', [AdController::class, 'store'])->name('ad.store');
   Route::get('edit/{ad}', [AdController::class, 'edit'])->name('ad.edit');
   Route::put('update/{ad}', [AdController::class, 'update'])->name('ad.update');
   Route::post('delete/{ad}', [AdController::class, 'destroy'])->name('ad.destroy');
   Route::get('show/{ad}', [AdController::class, 'show'])->name('ad.show');
    Route::get('search', [AdController::class, 'search'])->name('ad.search');
    Route::get('show/{ad}', [AdController::class, 'show'])->name('ad.show');
    
});


