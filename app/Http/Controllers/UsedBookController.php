<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\TransactionLocation;
use App\Models\UsedBook;
use App\Http\Requests\StoreUsedBookRequest;
use App\Http\Requests\UpdateUsedBookRequest;
use Illuminate\Http\Request;

class UsedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usedbooks = UsedBook::where('status', 1)->paginate(16);
        return view('usedbook.index', compact('usedbooks'));
    }
    public function backstageIndex()
    {
        $usedbooks = UsedBook::paginate(8);
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
        return view('backstage.usedbook.create', compact('categories'));
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
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsedBookRequest $request, UsedBook $usedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsedBook $usedBook)
    {
        //
    }
}
