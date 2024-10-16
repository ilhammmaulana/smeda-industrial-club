<?php

use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\Web\ProductBrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\DashboardController;
use App\Http\Controllers\WEB\ContentController;
use App\Http\Controllers\WEB\ProductController;
use App\Http\Controllers\WEB\ProfileController;
use App\Http\Controllers\WEB\SettingController;
use App\Http\Controllers\WEB\CategoryController;
use App\Http\Controllers\WEB\ProductDetailController;

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
    return redirect('/login');
});


Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');


Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('contents')->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('contents.index');
        Route::get('/create', [ContentController::class, 'create'])->name('contents.create');
        Route::get('/{id}/edit', [ContentController::class, 'edit'])->name('contents.edit');
        Route::post('/add', [ContentController::class, 'store'])->name('contents.store');
        Route::put('/{id}/edit', [ContentController::class, 'update'])->name('contents.update');
        Route::delete('/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
    });
});


require __DIR__ . '/auth.php';
