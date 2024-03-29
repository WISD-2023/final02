@extends('layouts.backstage')
@section('title', '建立二手書')
@section('page-content')

    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-[88rem] px-4 py-16 sm:px-6 sm:py-16 lg:px-8">

            <form action="{{ route('backstage.usedbook.store') }}" method="POST" role="form">
                @method('POST')
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">建立二手書資料</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">上架二手書資訊，讓使用者能快速選購所需的二手書。</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">書籍名稱</label>
                                <div class="mt-2">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍名稱">
                                </div>
                                @error('name')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="author" class="block text-sm font-medium mb-2 dark:text-white">書籍作者</label>
                                <div class="mt-2">
                                    <input type="text" id="author" name="author" value="{{ old('author') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入作者姓名">
                                </div>
                                @error('author')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pp" class="block text-sm font-medium mb-2 dark:text-white">出版項</label>
                                <div class="mt-2">
                                    <input type="text" id="pp" name="pp" value="{{ old('pp') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍出版項資訊">
                                </div>
                                @error('pp')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="isbn" class="block text-sm font-medium mb-2 dark:text-white">ISBN</label>
                                <div class="mt-2">
                                    <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍ISBN號碼">
                                </div>
                                @error('isbn')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="book_state" class="block text-sm font-medium mb-2 dark:text-white">書籍狀態</label>
                                <div class="mt-2">
                                    <select id="book_state" name="book_state" class="block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <option value="" selected disabled>請選擇書籍狀態</option>
                                        <option value="全新" {{ old('book_state') == '全新' ? 'selected' : '' }}>全新</option>
                                        <option value="九成新" {{ old('book_state') == '九成新' ? 'selected' : '' }}>九成新</option>
                                        <option value="八成新" {{ old('book_state') == '八成新' ? 'selected' : '' }}>八成新</option>
                                        <option value="七成新" {{ old('book_state') == '七成新' ? 'selected' : '' }}>七成新</option>
                                        <option value="六成新" {{ old('book_state') == '六成新' ? 'selected' : '' }}>六成新</option>
                                        <option value="五成新" {{ old('book_state') == '五成新' ? 'selected' : '' }}>五成新</option>
                                        <option value="五成新以下" {{ old('book_state') == '五成新以下' ? 'selected' : '' }}>五成新以下</option>
                                    </select>
                                </div>
                                @error('book_state')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description" class="block text-sm font-medium mb-2 dark:text-white">書況描述</label>
                                <div class="mt-2">
                                    <input type="text" id="description" name="description" value="{{ old('description') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入二手書書況">
                                </div>
                                @error('description')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="book_image" class="block text-sm font-medium mb-2 dark:text-white">二手書圖片</label>
                                <div class="mt-2">
                                    <input type="file" name="book_image" class="dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" accept="png/*" >
                                </div>
                                @error('book_image')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="pay_type" class="block text-sm font-medium mb-2 dark:text-white">交易方式</label>
                                <div class="mt-2">
                                    <select id="pay_type" name="pay_type" class="block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <option value="selected disabled">請選擇交易方式</option>
                                        @foreach($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->id }}" {{ old('pay_type') == $paymentMethod->id ? 'selected' : '' }}>
                                                {{ $paymentMethod->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('pay_type')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="trade_place" class="block text-sm font-medium mb-2 dark:text-white">交易地點</label>
                                <div class="mt-2">
                                    <select id="trade_place" name="trade_place" class="block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <option value="selected disabled">請選擇交易地點</option>
                                        @foreach($transactions as $transaction)
                                            <option value="{{ $transaction->id }}" {{ old('trade_place') == $transaction->id ? 'selected' : '' }}>
                                                {{ $transaction->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('trade_place')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="trade_at" class="block text-sm font-medium mb-2 dark:text-white">交易日期</label>
                                <div class="mt-2">
                                    <input type="date" id="trade_at" name="trade_at" value="{{ old('trade_at') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-400 dark:text-gray-700 dark:focus:ring-gray-600">
                                </div>
                                @error('trade_at')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
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
                                         }'value="{{ old('category_id') }}"  class="hidden" id="category_id" name="category_id">
                                            <option value="">Choose</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
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
                                    <input type="text" id="price" name="price" value="{{ old('price') }}" class="ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="0">
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
                                <label for="status" class="block text-sm font-medium mb-2 dark:text-white">庫存量</label>
                                <div class="mt-2">
                                    <div class="bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" data-hs-input-number>
                                        <div class="w-full flex justify-between items-center gap-x-1">
                                            <div class="grow py-2 px-3">
                                                <input value="{{ old('status', 1) }}" name="status" class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-gray-400 dark:focus:ring-gray-600" type="text" id="quantity" data-hs-input-number-input>
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
                                @error('status')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="reset" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">清 除</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建 立</button>
                </div>
            </form>
        </div>
    </div>

@endsection
