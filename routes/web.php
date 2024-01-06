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
Route::get('teachingmaterial', [TeachingMaterialController::class, 'index'])->name("teachingmaterial.index");
//搜尋授課書籍
Route::get('teachingmaterial/search', [TeachingMaterialController::class, 'search'])->name('teachingmaterial.search');

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
Route::middleware('auth')->prefix('backstage')->name('backstage.')->group(function () {
    //限制權限進入的路由

    //後台首頁
    Route::get('/dashboard', function (){ return view('backstage.dashboard'); })->name('dashboard');

    //會員後台路由
    Route::middleware('checkPermissions:1,3,4')->group(function () {
    /* usedbook */
        //二手書列表
        Route::get('usedbook', [UsedBookController::class, 'backstageIndex'])->name("usedbook.index");
        //搜尋二手書
        Route::get('usedbook/search', [UsedBookController::class, 'backstageSearch'])->name('usedbook.search');
        //新增二手書表單
        Route::get('usedbook/create', [UsedBookController::class, 'backstageCreate'])->name('usedbook.create');
        //新增二手書
        Route::post('usedbook', [UsedBookController::class, 'backstageStore'])->name('usedbook.store');

    });

    //學校後台路由
    Route::middleware('checkPermissions:2,4')->group(function () {
    /* newbook */
        //新書列表
        Route::get('newbook', [NewBookController::class, 'backstageIndex'])->name("newbook.index");
        //搜尋書籍
        Route::get('newbook/search', [NewBookController::class, 'backstageSearch'])->name('newbook.search');
        //新增書籍表單
        Route::get('newbook/create', [NewBookController::class, 'backstageCreate'])->name('newbook.create');
        //新增書籍
        Route::post('newbook', [NewBookController::class, 'backstageStore'])->name("newbook.store");
        //編輯書籍表單
        Route::get('newbook/{newbook}/edit', [NewBookController::class, 'backstageEdit'])->name('newbook.edit');
        //更新書籍
        Route::patch('newbook/{newbook}', [NewBookController::class, 'backstageUpdate'])->name('newbook.update');
        //刪除書籍
        Route::delete('newbook/{newbook}', [NewBookController::class, 'backstageDestroy'])->name('newbook.destroy');
    });

    //教師後台路由
    Route::middleware('checkPermissions:3,4')->group(function () {

        Route::get('teachingmaterial', [TeachingMaterialController::class, 'backstageIndex'])->name("teachingmaterial.index");
        Route::get('teachingmaterial/search', [TeachingMaterialController::class, 'backstageSearch'])->name('teachingmaterial.search');
        Route::get('teachingmaterial/create', [TeachingMaterialController::class, 'backstageCreate'])->name('teachingmaterial.create');
        Route::get('teachingmaterial/{teachingmaterial}/edit', [TeachingMaterialController::class, 'backstageEdit'])->name('teachingmaterial.edit');

        Route::patch('teachingmaterial/{teachingmaterial}', [TeachingMaterialController::class, 'backstageUpdate'])->name('teachingmaterial.update');

        Route::delete('teachingmaterial/{teachingmaterial}', [TeachingMaterialController::class, 'backstageDestroy'])->name('teachingmaterial.destroy');
    });

    //管理員後台路由
    Route::middleware('checkPermissions:4')->group(function () {

    });
});

/* auth */
require __DIR__.'/auth.php';
