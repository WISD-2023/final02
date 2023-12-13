<?php

use App\Http\Controllers\NewBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsedBookController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//首頁
Route::get('/', function () {
    return view('index');
});

//新書列表
Route::get('newbook', [NewBookController::class, 'index'])->name("newbook.index");
//搜尋書籍
Route::get('/newbooks/search', [NewBookController::class, 'search'])->name('newbooks.search');

//二手書列表
Route::get('usedbook', [UsedBookController::class, 'index'])->name('usedbook.index');
//搜尋二手書
Route::get('/usedbooks/search', [UsedBookController::class, 'search'])->name('usedbooks.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
