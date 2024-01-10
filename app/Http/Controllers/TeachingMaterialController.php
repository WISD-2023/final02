<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateTeachingMaterialRequest;
use App\Models\Category;
use App\Models\NewBook;
use App\Models\TeachingMaterial;
use App\Http\Requests\StoreTeachingMaterialRequest;
use App\Models\UsedBook;
use App\Models\User;
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
        $classnames = TeachingMaterial::all();
        $booknames = NewBook::all();

        return view('backstage.teachingmaterial.create', compact('booknames','classnames'));
    }
    public function backstageSearch(Request $request)
    {
        $search = $request->input('search');
        $teachingmaterials = TeachingMaterial::where('name', 'like', '%' . $search . '%')->paginate(10);

        return view('backstage.teachingmaterial.index', compact('teachingmaterials'));
    }
    public function backstageEdit(TeachingMaterial $teachingmaterial)
    {
        $classnames = TeachingMaterial::all();
        $booknames = NewBook::all();

        return view('backstage.teachingmaterial.edit', compact('teachingmaterial','booknames','classnames'));
    }
    public function backstageUpdate(UpdateTeachingMaterialRequest $request, TeachingMaterial $teachingmaterial)
    {
        $teachingmaterial->update($request->validated());
        return redirect(route('backstage.teachingmaterial.index'))->with([
            'success' => '授課書籍 [編號：'. $teachingmaterial-> id.'] 更新成功！',
            'type' => 'success',
        ]);
    }

    public function backstagedestroy(TeachingMaterial $teachingmaterial)
    {
        $teachingmaterial->delete();

        return redirect(route('backstage.teachingmaterial.index'))->with([
            'success' => '授課書籍 [編號：'. $teachingmaterial-> id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }

    public function backstageStore(StoreTeachingMaterialRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        // 在已驗證的數據中添加 user_id 欄位
        $validatedData['user_id'] = auth()->user()-> id;

        // 如果驗證失敗，將自動導回先前的表單

        // 驗證成功
        TeachingMaterial::create($validatedData);

        // 資料保存後轉跳回授課書總表
        return redirect(route('backstage.teachingmaterial.index'))->with([
            'success' => '授課書籍添加成功！',
            'type' => 'success',
        ]);
    }

}
