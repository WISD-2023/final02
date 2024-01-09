<?php

namespace App\Http\Controllers;

use App\Models\NewBook;
use App\Models\NewBookCart;
use App\Http\Requests\StoreNewBookCartRequest;
use App\Http\Requests\UpdateNewBookCartRequest;
use App\Models\NewBookCartsDetail;
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
        //負責人
        $herd = User::find($newBookCart->newBookCartsMember->where('is_owner', 1)->first()->user_id);

        //購物車資料
        $newBookCart->type = $newBookCart->type == 1 ? '團購' : '個人';

        //成員數量
        $newBookCart['number'] = $newBookCart->newBookCartsMember->count();

        //書籍數量
        $newBookCart['itemsQuantity'] = $newBookCart->newBookCartsItem->count();

        // 個人總金額
        // 從 new_book 表中找出與購物車項目相對應的新書價格
        $newBookPrices = NewBook::whereIn('id', $newBookCart->newBookCartsItem->pluck('new_book_id'))->pluck('price')->first();
        // 從 new_book_carts_detail 表中找出符合條件的購物車詳細資訊
        $filteredDetails = NewBookCartsDetail::whereIn('cart_item_id', $newBookCart->newBookCartsItem->pluck('id'))
            ->where('user_id', auth()->user()->id);
        // 計算個人總金額，乘上對應的新書價格，再加總數量
        $newBookCart['personalTotal'] = $newBookPrices * $filteredDetails->sum('quantity');

        //個人總數量
        $newBookCart['personalQuantity'] = $filteredDetails->sum('quantity');

        //團購總金額
        // 個人總金額的計算
        // 從 new_book_carts_detail 表中找出符合條件的購物車詳細資訊
        $groupFilteredDetails = NewBookCartsDetail::whereIn('cart_item_id', $newBookCart->newBookCartsItem->pluck('id'));
        // 計算個人總金額，乘上對應的新書價格，再加總數量
        $newBookCart['groupTotal'] = $newBookPrices * $groupFilteredDetails->sum('quantity');

        //團購總數量
        $newBookCart['groupQuantity'] = $groupFilteredDetails->sum('quantity');

        // 狀態
        $status = $newBookCart->schoolOrder->first();
        switch ($status) {
            case 1:
                $newBookCart['status'] = '備貨中';
                break;
            case 2:
                $newBookCart['status'] = '可取貨';
                break;
            case 3:
                $newBookCart['status'] = '已取消';
                break;
            case 4:
                $newBookCart['status'] = '已完成';
                break;
            default:
                $newBookCart['status'] = $newBookCart->is_submit == 0 ? '未送出' : '已送出';
                break;
        }



        // 書籍資料
        $items = NewBook::whereIn('id', $newBookCart->newBookCartsItem->pluck('new_book_id'))->paginate(8);

        /*---------每本書的總數功能未實現---------
        // 計算每本書的數量
        $detail = NewBookCartsDetail::whereIn('cart_item_id', $newBookCart->newBookCartsItem->pluck('id'))->get();
        // 按照 cart_item_id 進行分組，並計算每個組的 quantity 總和
        $sumByCartItems = $detail->groupBy('cart_item_id')->map(function ($group) {
            return $group->sum('quantity');
        });
        // 將每本書的數量寫入 items 的 quantity 屬性中
        $items->each(function ($item) use ($sumByCartItems) {

            foreach ($sumByCartItems as $quantity) {
                // 將數量設定到每本書的 quantity 屬性中
                $item->quantity = $quantity;
            }
        });
        ------------------------------------*/
        /*---------每本書的總價功能未實現---------*/

        /*------------------------------------*/


        return view('newbookcart.show', compact('newBookCart', 'herd', 'items'));
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
