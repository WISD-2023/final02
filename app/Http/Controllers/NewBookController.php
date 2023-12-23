<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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
        $newbooks = NewBook::paginate(15);
        return view('newbook.index', compact('newbooks'));
    }
    public function backstageIndex()
    {
        $newbooks = NewBook::paginate(8);
        return view('backstage.newbook.index', compact('newbooks'));
    }

    /**
     * 搜尋書籍
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $newbooks = NewBook::where('name', 'like', '%' . $search . '%')->paginate(15);

        return view('newbook.index', compact('newbooks'));
    }
    public function backstageSearch(Request $request)
    {
        $search = $request->input('search');
        $newbooks = NewBook::where('name', 'like', '%' . $search . '%')->paginate(8);

        return view('backstage.newbook.index', compact('newbooks'));
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
        return view('backstage.newbook.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewBookRequest $request)
    {
        //
    }

    public function backstageStore(StoreNewBookRequest $request)
    {
        // 如果驗證失敗，將自動導回先前的表單

        // 驗證成功
        NewBook::create($request->validated());

        // 資料保存後轉跳回新書總表
        return redirect(route('backstage.newbook.index'))->with([
            'success' => '書籍添加成功！',
            'type' => 'success',
        ]);
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
    public function backstageEdit(NewBook $newbook)
    {
        $categories = Category::all();
        return view('backstage.newbook.edit', compact('newbook', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewBookRequest $request, NewBook $newBook)
    {
        //
    }
    public function backstageUpdate(UpdateNewBookRequest $request, NewBook $newbook)
    {
        $newbook->update($request->validated());
        return redirect(route('backstage.newbook.index'))->with([
            'success' => '書籍 [編號：'. $newbook-> id.'] 更新成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewBook $newbook)
    {
        //
    }

    public function backstageDestroy(NewBook $newbook)
    {

        $newbook->delete();

        return redirect(route('backstage.newbook.index'))->with([
            'success' => '書籍 [編號：'. $newbook-> id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }

}
