<?php

namespace App\Http\Controllers;

use App\Models\AccountInfo;
use App\Http\Requests\StoreAccountInfoRequest;
use App\Http\Requests\UpdateAccountInfoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountInfoController extends Controller
{
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
    public function store(StoreAccountInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountInfo $accountInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountInfo $accountInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountInfoRequest $request): RedirectResponse
    {
        $user = $request->user();

        $accountInfo = $user->accountInfo()->firstOrNew(['user_id' => $user->id]);
        $accountInfo->created_at = $accountInfo->exists ? $accountInfo->created_at : now();
        $accountInfo->updated_at = now();
        $accountInfo->fill($request->validated())->save();

        return redirect()->route('profile.edit')->with('status', 'accountinfo-update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountInfo $accountInfo)
    {
        //
    }
}
