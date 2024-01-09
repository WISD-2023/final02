@extends('layouts.master')
@section('title', '購書單')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8 min-h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 dark:bg-gray-700 min-h-screen">
                    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
                        <!-- Invoice -->
                        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
                            <!-- Grid -->
                            <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-400 dark:border-gray-200">
                                <div>
                                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">購書單資訊</h2>
                                </div>
                                <!-- Col -->

                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line flex-shrink-0 w-4 h-4"><path d="M20 19.5v.5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8.5L18 5.5"/><path d="M8 18h1"/><path d="M18.4 9.6a2 2 0 0 1 3 3L17 17l-4 1 1-4Z"/></svg>
                                        修 改
                                    </a>
                                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-red-700 dark:text-red-300 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 flex-shrink-0 w-4 h-4"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                        刪 除
                                    </a>
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-drive-upload flex-shrink-0 w-4 h-4"><path d="m16 6-4-4-4 4"/><path d="M12 2v8"/><rect width="20" height="8" x="2" y="14" rx="2"/><path d="M6 18h.01"/><path d="M10 18h.01"/></svg>
                                        送 出
                                    </a>
                                </div>
                                <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Grid -->
                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <div class="grid space-y-3">
                                        <dl class="grid sm:flex gap-x-3 text-sm">
                                            <dt class="min-w-[150px] max-w-[200px] text-gray-400">
                                                購書單名稱
                                            </dt>
                                            <dd class="text-gray-800 dark:text-gray-200">
                                                <a class="inline-flex items-center gap-x-1.5 text-gray-600 dark:text-gray-200 decoration-2 hover:underline font-medium" href="#">
                                                    {{ $newBookCart->name }}
                                                </a>
                                            </dd>
                                        </dl>

                                        <dl class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                負責人
                                            </div>
                                            <div class="font-medium text-gray-800 dark:text-gray-200">
                                                <span class="block font-semibold">姓名：{{ $herd->name }}</span>
                                                電子郵件：{{ $herd->email }}<br>
                                                聯絡電話：{{ $herd->phone }}<br>
                                            </div>
                                        </dl>

                                        <div class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                購書單資訊
                                            </div>
                                            <div class="font-medium text-gray-800 dark:text-gray-200">
                                                <address class="not-italic font-normal">
                                                    類別：{{ $newBookCart->type }}<br>
                                                    建立時間：{{ $newBookCart->created_at }}<br>
                                                    最後更新時間：{{ $newBookCart->updated_at }}<br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col -->

                                <div>
                                    <div class="grid space-y-3">
                                        <div class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                邀請碼：
                                            </div>
                                            <div class="cursor-pointer select-all">
                                                {{ $newBookCart->invite_code }}
                                            </div>
                                        </div>

                                        <div class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                截止選購時間：
                                            </div>
                                            <div class="font-medium text-gray-800 dark:text-gray-200">
                                                {{ $newBookCart->deadline_at }}
                                            </div>
                                        </div>

                                        <div class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                成員人數：
                                            </div>
                                            <div class="font-medium text-gray-800 dark:text-gray-200">
                                                {{ $newBookCart->number }} 人
                                            </div>
                                        </div>

                                        <div class="grid sm:flex gap-x-3 text-sm">
                                            <div class="min-w-[150px] max-w-[200px] text-gray-400">
                                                書籍數量：
                                            </div>
                                            <div class="font-medium text-gray-800 dark:text-gray-200">
                                                {{ $newBookCart->itemsQuantity }}  本
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Table -->
                            <div class="mt-6 border border-gray-400 p-4 rounded-lg space-y-4 dark:border-gray-200">
                                <div class="hidden sm:grid sm:grid-cols-8">
                                    <div class="sm:col-span-2 text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">書籍名稱</div>
                                    <div class="text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">單價</div>
                                    <div class="text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">團購總數量</div>
                                    <div class="text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">團購總金額</div>
                                    <div class="text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">添購數量</div>
                                    <div class="text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">添購金額</div>
                                    <div class="text-end text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">操作</div>
                                </div>

                                <div class="hidden sm:block border-b border-gray-400 dark:border-gray-200"></div>
                                @foreach($items as $item)
                                <div class="grid grid-cols-3 sm:grid-cols-8 gap-2">
                                    <div class="col-span-full sm:col-span-2">
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">書籍名稱</h5>
                                        <p class="font-medium text-gray-800 dark:text-gray-200">{{ $item->name }}</p>
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">單價</h5>
                                        <p class="text-gray-800 dark:text-gray-200">NT$ {{ $item->price }}</p>
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">團購總數量</h5>
                                        <p class="text-gray-800 dark:text-gray-200">{{ $item->quantity }}</p>
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">團購總金額</h5>
                                        <p class="text-gray-800 dark:text-gray-200">{{ $item->quantity }}</p>
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">添購數量</h5>
                                        <!-- Input Number -->
                                        <div class="py-0.5 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-400" data-hs-input-number>
                                            <div class="flex items-center gap-x-1.5">
                                                <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                                    <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                                </button>
                                                <input class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white" type="text" value="0" data-hs-input-number-input>
                                                <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                                    <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Input Number -->
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">添購金額</h5>
                                        <p class="text-gray-800 dark:text-gray-200">$2789.00</p>
                                    </div>
                                    <div>
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">操作</h5>
                                        @if(auth()->user() != $herd)
                                            <span class="sm:text-end text-gray-700 dark:text-gray-300 cursor-not-allowed">刪除</span>
                                        @else
                                            <form action="" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="sm:text-end text-red-700 dark:text-red-300">
                                                    刪除
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </div>

                                <div class="sm:hidden border-b border-gray-300 dark:border-gray-400"></div>
                                @endforeach


                                <!-- Pagination -->
                                <div class="flex items-center justify-between border-t border-gray-400 bg-white dark:bg-gray-700 px-2 py-2 sm:px-6">
                                    <div class="flex flex-1 justify-between sm:hidden">
                                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">上一頁</a>
                                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">下一頁</a>
                                    </div>
                                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm text-gray-700 dark:text-gray-200">
                                                顯示第
                                                <span class="font-medium">{{ $items->firstItem() }}</span>
                                                至
                                                <span class="font-medium">{{ $items->lastItem() }} </span>
                                                筆資料，共
                                                <span class="font-medium">{{ $items->total() }}</span>
                                                筆資料
                                            </p>
                                        </div>
                                        <div>
                                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                                <div class="px-2">
                                                    <a href="{{ $items-> previousPageUrl() }}" class="relative inline-flex items-center rounded-md px-2 py-2 text-blue-400 ring-1 ring-inset ring-gray-300 dark:text-blue-200 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                        <span class="px-2">添購書籍存檔</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                                    </a>
                                                </div>
                                                <a href="0" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                    <span class="sr-only">上一頁</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a href="{{ $items-> nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                    <span class="sr-only">下一頁</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Pagination -->

                            </div>
                            <!-- End Table -->

                            <!-- Flex -->
                            <div class="mt-8 flex sm:justify-end">
                                <div class="w-full max-w-2xl sm:text-end space-y-2">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                        <div class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                            <p class="col-span-3 text-gray-500">狀態：</p>
                                            <p class="col-span-2 font-medium text-gray-800 dark:text-gray-200">{{ $newBookCart->status }}</p>
                                        </div>

                                        <div class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                            <p class="col-span-3 text-gray-500">個人總金額：</p>
                                            <p class="col-span-2 font-medium text-gray-800 dark:text-gray-200">NT$ {{ $newBookCart->personalTotal }}</p>
                                        </div>

                                        <div class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                            <p class="col-span-3 text-gray-500">個人總數量：</p>
                                            <p class="col-span-2 font-medium text-gray-800 dark:text-gray-200">{{ $newBookCart->personalQuantity }}本</p>
                                        </div>

                                        <div class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                            <p class="col-span-3 text-gray-500">團購總金額：</p>
                                            <p class="col-span-2 font-medium text-gray-800 dark:text-gray-200">NT$ {{ $newBookCart->groupTotal }}</p>
                                        </div>

                                        <div class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                            <p class="col-span-3 text-gray-500">團購總數量：</p>
                                            <p class="col-span-2 font-medium text-gray-800 dark:text-gray-200">{{ $newBookCart->groupQuantity }} 本</p>
                                        </div>
                                    </div>
                                    <!-- End Grid -->
                                </div>
                            </div>
                            <!-- End Flex -->
                        </div>
                        <!-- End Invoice -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
