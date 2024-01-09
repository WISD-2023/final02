<?php

namespace App\Http\Controllers;

use App\Models\NewBookCart;
use App\Models\NewBookCartsMember;
use App\Http\Requests\StoreNewBookCartsMemberRequest;
use App\Http\Requests\UpdateNewBookCartsMemberRequest;
use GuzzleHttp\Psr7\Request;

class NewBookCartsMemberController extends Controller
{
    protected function toastMsg($success_message, $toast_type)
    {
        return redirect(route('newbookcart.index'))->with([
            'success' => $success_message,
            'type' => $toast_type,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreNewBookCartsMemberRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        $newBookCartData = NewBookCart::where('invite_code', $validatedData['invite_code'])->first();

        if (!$newBookCartData) {
            return $this->toastMsg('無法加入！未能找到有效的邀請碼。', 'error');
        }

        if ($newBookCartData->type != 1) {
            return $this->toastMsg('無法加入！此購書單並非團購形式。', 'error');
        }

        $joinCartData['user_id'] = auth()->user()->id;
        $joinCartData['new_book_cart_id'] = $newBookCartData->id;

        $is_exist = NewBookCartsMember::where('user_id', $joinCartData['user_id'])
            ->where('new_book_cart_id', $joinCartData['new_book_cart_id'])
            ->first();

        if($is_exist != null){
            return $this->toastMsg('無法加入！您已經加入過此購書單。', 'warning');
        }

        // 驗證成功
        $NewBookCart =NewBookCartsMember::create($joinCartData);

        // 資料保存後轉跳回新書總表
        return $this->toastMsg('新增加入購書單成功！', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewBookCartsMember $newBookCartsMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewBookCartsMember $newBookCartsMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewBookCartsMemberRequest $request, NewBookCartsMember $newBookCartsMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewBookCartsMember $newBookCartsMember)
    {
        //
    }
}
