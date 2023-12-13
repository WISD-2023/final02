<?php

namespace App\Http\Controllers;

use App\Models\TeachingMaterial;
use App\Http\Requests\StoreTeachingMaterialRequest;
use App\Http\Requests\UpdateTeachingMaterialRequest;
use Illuminate\Http\Request;

class TeachingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachingmaterials = TeachingMaterial::paginate(15);
        return view('teachingmaterials.index', compact('teachingmaterials'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $teachingmaterials  = TeachingMaterial::where('name', 'like', '%' . $search . '%')->paginate(15);

        return view('teachingmaterials.index', compact('teachingmaterials'));
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
    public function store(StoreTeachingMaterialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachingMaterial $teachingMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachingMaterial $teachingMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeachingMaterialRequest $request, TeachingMaterial $teachingMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingMaterial $teachingMaterial)
    {
        //
    }
}
