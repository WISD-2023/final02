<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateNewBookRequest;
use App\Models\Category;
use App\Models\NewBook;
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
        return view('teachingmaterial.index', compact('teachingmaterials'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $teachingmaterials  = TeachingMaterial::where('name', 'like', '%' . $search . '%')->paginate(15);

        return view('teachingmaterial.index', compact('teachingmaterials'));
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

    public function backstageIndex()
    {
        $teachingmaterials = TeachingMaterial::paginate(8);
        return view('backstage.teachingmaterial.index', compact('teachingmaterials'));

    }
    public function backstageCreate()
    {
        $categories = Category::all();
        return view('backstage.teachingmaterial.create', compact('categories'));
    }
    public function backstageSearch(Request $request)
    {
        $search = $request->input('search');
        $teachingmaterials = TeachingMaterial::where('name', 'like', '%' . $search . '%')->paginate(8);

        return view('backstage.teachingmaterial.index', compact('teachingmaterials'));
    }
    public function backstageEdit(NewBook $teachingmaterial)
    {
        $categories = Category::all();
        return view('backstage.teachingmaterial.edit', compact('teachingmaterial', 'categories'));
    }
    public function backstageUpdate(UpdateTeachingMaterialRequest $request, TeachingMaterial $teachingmaterial)
    {
        $teachingmaterial->update($request->validated());
        return redirect(route('backstage.teachingmaterial.index'))->with([
            'success' => '書籍 [編號：'. $teachingmaterial-> id.'] 更新成功！',
            'type' => 'success',
        ]);
    }
    public function backstageStore(StoreTeachingMaterialRequest $request)
    {
        //
    }


}
