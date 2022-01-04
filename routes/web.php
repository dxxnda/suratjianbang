<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkeluarController;
use App\Http\Controllers\SmasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registrasi']);
Route::post('/register', [AuthController::class, 'registrasiStore']);

Route::group(['middleware' => ['auth']], function (){
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('smasuk', SmasukController::class);
    Route::post('/smasuk/cari', [SmasukController::class, 'cari']);
    Route::resource('skeluar', SkeluarController::class);
    Route::resource('user', UserController::class);
    Route::get('/masuk/cetak', [SmasukController::class, 'cetak']);

});
