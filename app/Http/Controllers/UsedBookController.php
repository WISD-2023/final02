<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\TransactionLocation;
use App\Models\UsedBook;
use App\Http\Requests\StoreUsedBookRequest;
use App\Http\Requests\UpdateUsedBookRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class UsedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usedbooks = UsedBook::where('status', '>=', 1)->paginate(16);
        return view('usedbook.index', compact('usedbooks'));
    }
    public function backstageIndex()
    {
        if (auth()-> user()-> permission == 1)
        {
            $usedbooks = auth() -> user()->usedbook()-> paginate(8);
        } else
        {
            $usedbooks = UsedBook::paginate(8);
        }
        return view('backstage.usedbook.index', compact('usedbooks'));
    }

    /**
     * 搜尋二手書
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $usedbooks = UsedBook::where('name', 'like', '%' . $search . '%')->paginate(16);

        return view('usedbook.index', compact('usedbooks'));
    }
    public function backstageSearch(Request $request)
    {
        $search = $request->input('search');
        $usedbooks = UsedBook::where('name', 'like', '%' . $search . '%')->paginate(8);

        return view('backstage.usedbook.index', compact('usedbooks'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function backstageCreate()
    {
        $categories = Category::all();
        $paymentMethods = PaymentMethod::all();
        $transactions = TransactionLocation::all();
        return view('backstage.usedbook.create', compact('categories','paymentMethods','transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsedBookRequest $request)
    {
        //
    }
    public function backstageStore(StoreUsedBookRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        // 在已驗證的數據中添加 user_id 欄位
        $validatedData['user_id'] = auth()->user()->id;

        // 添加時間到 created_at 和 updated_at 欄位
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        // 如果驗證失敗，將自動導回先前的表單

        // 驗證成功

        // 如果有上傳圖片
        if ($request->hasFile('book_image')) {
            $image = $request->file('book_image');
            $imageName = time().'.'.$request->book_image->extension();
            // 移動圖片到目標目錄
            $image->move(public_path('images'), $imageName);

            // 將檔案名稱存入資料庫
            $validatedData['book_image'] = $imageName;
        }

        // 資料庫儲存
        UsedBook::create($validatedData);

        // 資料保存後轉跳回新書總表
        return redirect(route('backstage.usedbook.index'))->with([
            'success' => '書籍添加成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($usedbook)
    {
        $showbook = UsedBook::where('id', $usedbook) -> firstOrFail();
        return view('usedbook.show', [
            'usedbook' => $showbook,
            'paymethod' => json_decode (PaymentMethod::where('id', $showbook -> pay_type) -> pluck('name'), true)[0],
            'transaction' => json_decode (TransactionLocation::where('id', $showbook -> trade_place) -> pluck('name'), true)[0],
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsedBook $usedBook)
    {
        //
    }
    public function backstageEdit(UsedBook $usedbook)
    {
        $categories = Category::all();
        $paymentMethods = PaymentMethod::all();
        $transactions = TransactionLocation::all();
        $usedbook->trade_at = Carbon::parse($usedbook->trade_at)->format('Y-m-d');
        return view('backstage.usedbook.edit', compact('usedbook', 'categories','paymentMethods','transactions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsedBookRequest $request, UsedBook $usedbook)
    {
        //
    }
    public function backstageUpdate(UpdateUsedBookRequest $request, UsedBook $usedbook)
    {
        $usedbook->update($request->validated());
        return redirect(route('backstage.usedbook.index'))->with([
            'success' => '書籍 [編號：'. $usedbook-> id.'] 更新成功！',
            'type' => 'success',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsedBook $usedBook)
    {
        //
    }
    public function backstageDestroy(UsedBook $usedbook)
    {
        $usedbook->delete();

        return redirect(route('backstage.usedbook.index'))->with([
            'success' => '書籍 [編號：'. $usedbook-> id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }
}
