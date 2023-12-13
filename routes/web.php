<?php

use App\Http\Controllers\AccountInfoController;
use App\Http\Controllers\NewBookController;
use App\Http\Controllers\TeachingMaterialController;
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
Route::get('newbooks/search', [NewBookController::class, 'search'])->name('newbooks.search');


//二手書列表
Route::get('usedbook', [UsedBookController::class, 'index'])->name('usedbook.index');
//搜尋二手書
Route::get('usedbooks/search', [UsedBookController::class, 'search'])->name('usedbooks.search');

//指定授課書籍
Route::get('teachingmaterial', [TeachingMaterialController::class, 'index'])->name("teachingmaterials.index");
//搜尋授課書籍
Route::get('teachingmaterials/search', [TeachingMaterialController::class, 'search'])->name('teachingmaterials.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //帳號資訊編輯表單
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //帳號更新：name, email, phone, address
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //刪除帳號
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //銀行帳號資訊
    Route::patch('/accountinfo', [AccountInfoController::class, 'update'])->name('accountinfo.update');
});

require __DIR__.'/auth.php';
