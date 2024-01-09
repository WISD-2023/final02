@extends('layouts.master')
@section('title', '新書購書單')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8 min-h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 dark:bg-gray-700 min-h-screen">
                    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    新書購書單列表
                                </h2>
                                <p class="mt-4 text-base text-gray-500 dark:text-white">
                                    在線上與校方訂購書籍，免去繁瑣的申請及排隊，快速購買書籍。
                                </p>
                            </div>
                            <div class="grid sm:flex gap-3">
                                <!-- 邀請碼搜尋表單 -->
                                <div class="mt-4 sm:mt-0">
                                    <p class="text-lg font-bold text-end tracking-tight text-gray-600 dark:text-white">
                                        透過邀請碼加入團購書單
                                    </p>

                                    <div class="flex items-center mt-2">
                                        <form action="{{ route('newbookcartmember.store') }}" method="POST" role="form" class="mt-4 sm:mt-0">
                                            @method('POST')
                                            @csrf
                                            <div class="flex rounded-lg w-full shadow-sm">
                                                <span class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-400">邀請碼</span>
                                                <input id="invite_code" name="invite_code" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-e-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                            </div>
                                            @error('invite_code')
                                            <div class="text-red-400">{{ $message }}</div>
                                            @enderror
                                        </form>
                                    </div>
                                </div>
                                <!--
                                <div class="px-2 border-t sm:border-t-0 sm:border-s border-gray-200 dark:border-gray-700"></div>

                                建立新的購書單表單
                                <form action="#" method="GET" class="mt-4 sm:mt-0">
                                    <p class="text-lg font-bold text-end tracking-tight text-gray-600 dark:text-white">
                                        建立新的購書單
                                    </p>
                                    <div class="flex items-center mt-2">
                                        <button type="button" class="w-full py-2 px-3 inline-flex justify-center items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                            建立新購書單
                                        </button>
                                    </div>
                                </form>
                                 -->
                            </div>
                        </div>

                        <!-- Card Section -->
                        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-8 mx-auto">
                            <div class="flex justify-between py-4">
                                <div class="w-1/4">
                                    <form action="{{ route('newbookcart.index') }}" method="GET" class="mt-4 sm:mt-0">
                                        <label for="status" class="block text-sm font-medium mb-2 dark:text-white">購書單狀態</label>
                                        <select class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                id="status" name="status" onchange="this.form.submit()">
                                            <option value="all" {{ $status === 'all' ? 'selected' : '' }}>全部</option>
                                            <option value="inProgress" {{ $status === 'inProgress' ? 'selected' : '' }}>進行中</option>
                                            <option value="finished" {{ $status === 'finished' ? 'selected' : '' }}>已結束</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="w-1/2 flex justify-end items-center">
                                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                        <a href="{{ $newBookCarts -> previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:ring-gray-500 dark:hover:bg-gray-500 focus:z-20 focus:outline-offset-0">
                                            <span class="sr-only">上一頁</span>
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ $newBookCarts -> nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:ring-gray-500 dark:hover:bg-gray-500 focus:z-20 focus:outline-offset-0">
                                            <span class="sr-only">下一頁</span>
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </nav>
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-2 gap-3 sm:gap-6">
                            @foreach($newBookCarts as $newBookCart)
                                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                   href="#">
                                    <div class="p-4 md:p-5">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                    {{ $newBookCart -> name }}
                                                    <span class="inline-flex items-center gap-x-1 py-0.5 px-3 rounded-lg text-xs font-medium {{ $newBookCart -> type == '團購' ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500' : 'bg-orange-100 text-orange-800 dark:bg-orange-800/30 dark:text-orange-500'}} ">
                                                        {{ $newBookCart -> type }}
                                                    </span>
                                                </h3>
                                                <p class="text-sm text-gray-500">
                                                    負責人：{{ $newBookCart -> user_name}}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    截止時間：{{ $newBookCart -> deadline_at -> toDateString() }} |
                                                    剩餘時間：{{ $newBookCart -> deadline_at -> diffForHumans() }}
                                                    <span class="{{ ($newBookCart->deadline_at < now()) ? 'text-red-500' : 'text-blue-500' }}">
                                                        [{{ ($newBookCart->deadline_at < now()) ? '已結束' : '進行中' }}]
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="ps-3">
                                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m9 18 6-6-6-6"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            @if(count($newBookCarts) < 9)
                                <!--單頁購書單未滿時加入 添加按鈕-->
                                <a href="{{ route('newbookcart.create') }}" class="group flex flex-col items-center justify-center bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 p-4 md:p-5">
                                    <div class="flex items-center p-4 md:p-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-plus group-hover:text-blue-600 dark:group-hover:text-gray-400"><path d="M11 12H3"/><path d="M16 6H3"/><path d="M16 18H3"/><path d="M18 9v6"/><path d="M21 12h-6"/></svg>
                                        <h3 class="px-2 text-xl group-hover:text-blue-600 text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            建立新購書單
                                        </h3>
                                    </div>
                                </a>
                            @endif



                            </div>
                            <!-- 若沒有任何購書單顯示資訊 -->
                            <!-- 暫不使用
                            <div class="h-[28rem] text-center text-gray-500 dark:text-gray-400 flex flex-col justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#d57272" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-octagon">
                                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"/>
                                    <line x1="12" x2="12" y1="8" y2="12"/>
                                    <line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                <h4 class="py-2 text-xl font-medium dark:text-gray-400">沒有購書單</h4>
                                <p class="text-gray-500 dark:text-gray-400">請點擊上方按鈕建立新的購書單</p>
                            </div>
                           -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
