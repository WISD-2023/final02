<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\TransactionLocation;
use App\Models\UsedBook;
use App\Models\UsedBookCart;
use App\Http\Requests\StoreUsedBookCartRequest;
use App\Http\Requests\UpdateUsedBookCartRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class UsedBookCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $usedBookCarts = UsedBookCart::with('usedBook')->where('user_id', $user->id)->get();

        $bookData = [];

        foreach ($usedBookCarts as $cart) {

            $bookData[] = [
                'bookImage' => $cart->usedBook->book_image,
                'bookName' => $cart->usedBook->name,
                'bookPrice' => $cart->usedBook->price,
                'description' => $cart->usedBook->description,
                'username' => $cart->usedBook->user->name,
                'bookState' => $cart->usedBook->book_state,
                'status' => $cart->usedBook->status,
                'payMethod' => PaymentMethod::find($cart->usedBook->pay_type)->name,
                'transaction' => TransactionLocation::find($cart->usedBook->trade_place)->name,
                'tradeAt' => $cart->usedBook->trade_at,
            ];
        }

        return view('usedbookcart.index', [
            'usedBookCarts' => $bookData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsedBookCartRequest $request)
    {
        //
    }

    public function addCart(UsedBook $usedbook)
    {
        $user = Auth::user();

        $usedBookCart = UsedBookCart::create([
            'user_id' => $user->id,
            'used_book_id' => $usedbook->id,
        ]);

        // 資料保存後轉跳至購書單
        return redirect(route('usedbookcart.index'))->with([
            'success' => '加入購物車成功!',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UsedBookCart $usedBookCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsedBookCart $usedBookCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsedBookCartRequest $request, UsedBookCart $usedBookCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsedBookCart $usedBookCart)
    {
        //
    }
}
