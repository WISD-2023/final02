<?php

namespace App\Http\Controllers;

use App\Models\NewBook;
use App\Http\Requests\StoreNewBookRequest;
use App\Http\Requests\UpdateNewBookRequest;

class NewBookController extends Controller
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
    public function store(StoreNewBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewBook $newBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewBook $newBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewBookRequest $request, NewBook $newBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewBook $newBook)
    {
        //
    }
}
