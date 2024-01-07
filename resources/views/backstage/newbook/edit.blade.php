@extends('layouts.backstage')
@section('title', '編輯新書資訊')
@section('page-content')

    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-[88rem] px-4 py-16 sm:px-6 sm:py-16 lg:px-8">

            <form action="{{ route('backstage.newbook.update', $newbook) }}" method="POST" role="form">
                @method('PATCH')
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">編輯新書籍資料</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">即時更新新書資訊以供教師設置指定授課書籍，便於學生能快速選購課程所需書籍。</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">書籍名稱</label>
                                <div class="mt-2">
                                    <input type="text" id="name" name="name" value="{{ old('name', $newbook -> name ) }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍名稱">
                                </div>
                                @error('name')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-4">
                                <label for="author" class="block text-sm font-medium mb-2 dark:text-white">書籍作者</label>
                                <div class="mt-2">
                                    <input type="text" id="author" name="author" value="{{ old('author', $newbook -> author) }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入作者姓名">
                                </div>
                                @error('author')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-4">
                                <label for="pp" class="block text-sm font-medium mb-2 dark:text-white">出版項</label>
                                <div class="mt-2">
                                    <input type="text" id="pp" name="pp" value="{{ old('pp', $newbook -> pp ) }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍出版項資訊">
                                </div>
                                @error('pp')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-4">
                                <label for="isbn" class="block text-sm font-medium mb-2 dark:text-white">ISBN</label>
                                <div class="mt-2">
                                    <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $newbook -> isbn ) }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍ISBN號碼">
                                </div>
                                @error('isbn')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="category_id" class="block text-sm font-medium mb-2 dark:text-white">中文圖書分類</label>
                                <div class="mt-2">
                                    <div class="relative">
                                        <select data-hs-select='{
                                          "hasSearch": true,
                                          "searchPlaceholder": "搜尋分類...",
                                          "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                                          "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                                          "placeholder": "選擇分類",
                                          "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                          "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                                          "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                                          "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                                          "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                                         }' class="hidden" id="category_id" name="category_id">
                                            <option value="">Choose</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $newbook->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->id }} | {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="absolute top-1/2 end-3 -translate-y-1/2">
                                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                                        </div>
                                    </div>
                                </div>
                                @error('category_id')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="price" class="block text-sm font-medium mb-2 dark:text-white">單價</label>
                                <div class="relative">
                                    <input type="text" id="price" name="price" value="{{ old('price', $newbook -> price ) }}" class="ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="0">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                                        <span class="text-gray-500">新台幣</span>
                                    </div>
                                </div>
                                @error('price')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="quantity" class="block text-sm font-medium mb-2 dark:text-white">庫存量</label>
                                <div class="mt-2">
                                    <div class="bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" data-hs-input-number>
                                        <div class="w-full flex justify-between items-center gap-x-1">
                                            <div class="grow py-2 px-3">
                                                <input value="{{ old('quantity', $newbook -> quantity) }}" name="quantity" class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-gray-400 dark:focus:ring-gray-600" type="text" id="quantity" data-hs-input-number-input>
                                            </div>
                                            <div class="flex items-center -gap-y-px divide-x divide-gray-200 border-s border-gray-200 dark:divide-gray-700 dark:border-gray-700">
                                                <button type="button" class="w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                                    <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                                </button>
                                                <button type="button" class="w-10 h-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                                    <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('quantity')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="reset" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">清 除</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">更 新</button>
                </div>
            </form>
        </div>
    </div>

@endsection
