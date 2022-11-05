<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\CheckReferral;

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

Auth::routes(['register' => false]);
Route::middleware([CheckReferral::class])->get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::middleware([CheckReferral::class])->post('/register', [RegisterController::class, 'register']);

Route::prefix('admin')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::resources([
    'wallets' => WalletController::class,
  ]);

  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/users/referred', [UserController::class, 'referredUsers'])->name('users.referred');
  Route::get('/users/stats', [UserController::class, 'stats'])->name('users.stats');
});
