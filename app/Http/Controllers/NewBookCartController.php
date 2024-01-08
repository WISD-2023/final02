<?php

namespace App\Http\Controllers;

use App\Models\NewBookCart;
use App\Http\Requests\StoreNewBookCartRequest;
use App\Http\Requests\UpdateNewBookCartRequest;
use App\Models\NewBookCartsMember;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewBookCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');

        $newBookCarts = NewBookCart::whereIn('id', auth()->user()->newBookCartsMember->pluck('new_book_cart_id'));


        if ($status === 'inProgress'){
            $newBookCarts->where('deadline_at', '>', now());
        }
        elseif ($status === 'finished'){
            $newBookCarts->where('deadline_at', '<', now());
        }

        $newBookCarts = $newBookCarts->paginate(8);

        $newBookCarts->each(function ($newBookCart) {
            $name = User::where(
                'id', NewBookCartsMember::where('new_book_cart_id', $newBookCart->id)->
                where('is_owner' , 1)->value('user_id')
            )->value('name');
            $newBookCart->user_name = $name;
            $newBookCart->type = $newBookCart->type == 1 ? '團購' : '個人';
            $newBookCart->deadline_at = Carbon::parse($newBookCart->deadline_at);
        });

        return view('newbookcart.index', compact('newBookCarts', 'status'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newbookcart.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewBookCartRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        // 在已驗證的數據中添加欄位
        $validatedData['invite_code'] = Str::random(8);

        // 驗證成功
        $NewBookCart =NewBookCart::create($validatedData);

        $CartId = $NewBookCart->id;

        $NewBookCart->newBookCartsMember()->create([
            'user_id' => auth()->user()->id,
            'is_owner' => 1,
        ]);


        // 資料保存後轉跳回新書總表
        return redirect(route('newbookcart.index'))->with([
            'success' => '購書單新增成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(NewBookCart $newBookCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewBookCart $newBookCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewBookCartRequest $request, NewBookCart $newBookCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewBookCart $newBookCart)
    {
        //
    }
}
