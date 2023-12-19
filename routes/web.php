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

/* newbook */
//新書列表
Route::get('newbook', [NewBookController::class, 'index'])->name("newbook.index");
//搜尋書籍
Route::get('newbook/search', [NewBookController::class, 'search'])->name('newbook.search');

/* usedbook */
//二手書列表
Route::get('usedbook', [UsedBookController::class, 'index'])->name('usedbook.index');
//搜尋二手書
Route::get('usedbook/search', [UsedBookController::class, 'search'])->name('usedbook.search');
//指定二手書商品頁面
Route::get('usedbook/{usedbook}', [UsedBookController::class, 'show'])->name('usedbook.show');

/* teachingmaterial */
//指定授課書籍
Route::get('teachingmaterial', [TeachingMaterialController::class, 'index'])->name("teachingmaterials.index");
//搜尋授課書籍
Route::get('teachingmaterials/search', [TeachingMaterialController::class, 'search'])->name('teachingmaterials.search');

/* profile */
//需要登入後才能進入的路由
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

/* backstage */
//需要登入後才能進入的後台路由
Route::middleware('auth')->prefix('backstage')->group(function () {
    //限制權限進入的路由

    //後台首頁
    Route::get('/dashboard', function (){ return view('backstage.dashboard'); })->name('dashboard');

    //會員後台路由
    Route::middleware('checkPermissions:1')->prefix('member')->name('member.')->group(function () {

    });

    //教師後台路由
    Route::middleware('checkPermissions:2')->prefix('teacher')->name('teacher.')->group(function () {

    });

    //學校後台路由
    Route::middleware('checkPermissions:3')->prefix('school')->name('school.')->group(function () {
    /* newbook */
        //新書列表
        Route::get('newbook', [NewBookController::class, 'schoolIndex'])->name("newbook.index");
        //搜尋二手書
        Route::get('usedbook/search', [NewBookController::class, 'schoolSearch'])->name('newbook.search');
        //新增書籍表單
        Route::get('newbook/create', [NewBookController::class, 'schoolCreate'])->name('newbook.create');
        //新增書籍
        Route::post('newbook', [NewBookController::class, 'schoolStore'])->name("newbook.store");
        //編輯書籍表單
        Route::get('newbook/{newbook}/edit', [NewBookController::class, 'schoolEdit'])->name('newbook.edit');
        //更新書籍
        Route::patch('newbook/{newbook}', [NewBookController::class, 'schoolUpdate'])->name('newbook.update');
        //刪除書籍
        Route::delete('newbook/{newbook}', [NewBookController::class, 'destroy'])->name('newbook.destroy');
    });

    //管理員後台路由
    Route::middleware('checkPermissions:4')->prefix('admin')->name('admin.')->group(function () {

    });
});

/* auth */
require __DIR__.'/auth.php';
