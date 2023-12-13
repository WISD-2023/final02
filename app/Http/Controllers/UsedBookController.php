<?php

namespace App\Http\Controllers;

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
        $usedbooks = UsedBook::paginate(16);
        return view('usedbook.index', compact('usedbooks'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $usedbooks = UsedBook::where('name', 'like', '%' . $search . '%')->paginate(16);

        return view('usedbook.index', compact('usedbooks'));
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
    public function store(StoreUsedBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsedBook $usedBook)
    {
        return view('usedbook.show', [
            'usedbookItem' => UsedBook::where($usedBook->id) -> first()
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
