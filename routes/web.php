<?php

use App\Http\Controllers\AccountInfoController;
use App\Http\Controllers\NewBookCartController;
use App\Http\Controllers\NewBookCartsItemController;
use App\Http\Controllers\NewBookCartsMemberController;
use App\Http\Controllers\NewBookController;
use App\Http\Controllers\TeachingMaterialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsedBookCartController;
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

/* newbookcart */
//需要登入後才能進入的路由
Route::middleware('auth')->group(function () {
    //新書購書單列表
    Route::get('newbookcart', [NewBookCartController::class, 'index'])->name("newbookcart.index");
    //購書單類型
    Route::get('newbookcart/search', [NewBookCartController::class, 'search'])->name('newbookcart.search');
    //新增購書單表單
    Route::get('newbookcart/create', [NewBookCartController::class, 'create'])->name('newbookcart.create');
    //新增購書單
    Route::post('newbookcart', [NewBookCartController::class, 'store'])->name('newbookcart.store');
    //指定購書單頁面
    Route::get('newbookcart/{newBookCart}', [NewBookCartController::class, 'show'])->name('newbookcart.show');
});

/* newbookcartmember */
//需要登入後才能進入的路由
Route::middleware('auth')->group(function () {
    //加入購書單
    Route::post('newbookcartmember', [NewBookCartsMemberController::class, 'store'])->name("newbookcartmember.store");
});

/* usedbook */
//二手書列表
Route::get('usedbook', [UsedBookController::class, 'index'])->name('usedbook.index');
//搜尋二手書
Route::get('usedbook/search', [UsedBookController::class, 'search'])->name('usedbook.search');
//指定二手書商品頁面
Route::get('usedbook/{usedbook}', [UsedBookController::class, 'show'])->name('usedbook.show');

/*usedbookcart*/
//需要登入後才能進入的路由
Route::middleware('auth')->group(function () {
    //二手書購書單
    Route::get('usedbookcart', [UsedBookCartController::class,'index'])->name('usedbookcart.index');
    //二手書家道購物車
    Route::post('usedbookcart/addCart/{usedbook}', [UsedBookCartController::class,'addCart'])->name('usedbookcart.addCart');
});

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
        //編輯二手書表單
        Route::get('usedbook/{usedbook}/edit', [UsedBookController::class, 'backstageEdit'])->name('usedbook.edit');
        //更新書籍表單
        Route::patch('usedbook/{usedbook}', [UsedBookController::class, 'backstageUpdate'])->name('usedbook.update');
        //刪除書籍
        Route::delete('usedbook/{usedbook}', [UsedBookController::class, 'backstageDestroy'])->name('usedbook.destroy');
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
