@extends('layouts.master')
@section('title', '新增購書單')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8 min-h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 dark:bg-gray-700 min-h-screen">
                    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
                        <div class="flex justify-end">
                            <a class="py-1.5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                               href="{{ route('newbookcart.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z" clip-rule="evenodd" />
                                </svg>
                                返回購書單列表
                            </a>
                        </div>
                        <!-- Card Section -->
                        <div class="max-w-[85rem] px-4 py-8 sm:px-6 lg:px-8 lg:py-8 mx-auto">
                            <form action="{{ route('newbookcart.store') }}" method="POST" role="form">
                            @method('POST')
                            @csrf
                                <div class="space-y-12">
                                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                                        <div>
                                            <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                新增新書購書單
                                            </h2>
                                            <p class="mt-4 text-base text-gray-500 dark:text-white">
                                                在線上與校方訂購書籍，免去繁瑣的申請及排隊，快速購買書籍。
                                            </p>
                                        </div>

                                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                                            <div class="sm:col-span-4">
                                                <div class="flex items-center">
                                                    <label for="name" class="block text-sm font-medium mb-2 dark:text-white">書籍名稱</label>
                                                    <div class="col-start-3 ml-2">
                                                        <div class="hs-tooltip inline-block [--placement:right]">
                                                            <button type="button" class="hs-tooltip-toggle w-4 h-4 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-white/[.05] dark:hover:border-white/[.1] dark:hover:text-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle">
                                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                                                    <path d="M12 17h.01"/>
                                                                </svg>
                                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-gray-500" role="tooltip">
                                                                    命名購書單有利於用戶辨別購書單差異。
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入書籍名稱...">
                                                </div>
                                                @error('name')
                                                <div class="text-red-400">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="sm:col-span-4">
                                                <div class="flex items-center">
                                                    <label for="type" class="block text-sm font-medium mb-2 dark:text-white">購書單類型</label>
                                                    <div class="col-start-3 ml-2">
                                                        <div class="hs-tooltip inline-block [--placement:right]">
                                                            <button type="button" class="hs-tooltip-toggle w-4 h-4 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-white/[.05] dark:hover:border-white/[.1] dark:hover:text-white" placeholder="請選擇類型...">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle">
                                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                                                    <path d="M12 17h.01"/>
                                                                </svg>
                                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-gray-500 text-left" role="tooltip">
                                                                    個人：僅有購書籍所有者可以添購書籍。<br>團購：可與多位使用者共同家購新書籍。<br>(若選擇團購會自動建構邀請碼。)
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <select id="type" name="type" class="block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                                    <option value="" disabled selected hidden>請選擇類型...</option>
                                                    <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>團購</option>
                                                    <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>個人</option>
                                                </select>

                                                @error('type')
                                                <div class="text-red-400">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="sm:col-span-4">
                                                <div class="flex items-center">
                                                    <label for="deadline_at" class="block text-sm font-medium mb-2 dark:text-white">截止加購日期</label>
                                                    <div class="col-start-3 ml-2">
                                                        <div class="hs-tooltip inline-block [--placement:right]">
                                                            <button type="button" class="hs-tooltip-toggle w-4 h-4 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-white/[.05] dark:hover:border-white/[.1] dark:hover:text-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle">
                                                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                                                    <path d="M12 17h.01"/>
                                                                </svg>
                                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-gray-500" role="tooltip">
                                                                    截止日期為購書單結束加購日期，過期後將無法再加購書籍。
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <input type="date" id="deadline_at" name="deadline_at" value="{{ old('date') }}" class=" block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                                </div>
                                                @error('deadline_at')
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
                </div>
            </div>
        </div>
    </div>

@endsection
