<?php
use App\Http\Controllers\BilController;

use Illuminate\Support\Facades\Route;

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
Route::get('/bil-chart', [BilController::class, 'index'])->name('bil.chart');
Route::get('/test', [BilController::class, 'index'])->name('test.chart');

Route::get('/dashboard', [BilController::class, 'index'])->name('dashboard');