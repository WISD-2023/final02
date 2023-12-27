@extends('layouts.master')
@section('title', '二手書列表')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-700">
                    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 ">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">二手書列表</h2>
                                    <p class="mt-4 text-base text-gray-500 dark:text-white">可瀏覽正在販售的二手書籍資訊，並即時添加至購書單中。</p>
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <form action="{{ route('usedbook.search') }}" method="GET">
                                        <div class="flex items-center">
                                            <input type="text" name="search" id="search" placeholder="搜尋書名" class="border rounded-md border-gray-200 dark:bg-gray-700 dark:border-gray-400 py-1 px-2 mr-2">
                                            <button type="submit" class="bg-blue-600 text-white dark:bg-blue-800 dark:text-gray-200 px-4 py-1 rounded-md">搜尋</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-8 flow-root ">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                    <div class="bg-white dark:bg-gray-700">
                                        <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 sm:py-4 lg:max-w-7xl lg:px-8 border border-gray-50 dark:border-gray-500">
                                            <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-12 sm:gap-x-6 md:grid-cols-4 md:gap-y-2 lg:gap-x-8">
                                                @foreach($usedbooks as $usedbook)
                                                    <div class="group relative">
                                                        <div class="h-56 w-48 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:h-48 xl:h-48">
                                                                <img src="{{asset('images/'.$usedbook->book_image)}}" alt="Hand stitched, orange leather long wallet." class="h-48 w-48 object-cover object-center">
                                                            </div>
                                                        <p class="mt-4 text-sm text-gray-700 dark:text-white">
                                                            <a href="{{route('usedbook.show', $usedbook)}}">
                                                                <span class="absolute inset-0"></span>
                                                                {{ $usedbook->name}}
                                                            </a>
                                                        </p>
                                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $usedbook->author}}</p>
                                                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">${{ $usedbook->price}}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mt-8 text-sm md:hidden">
                                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-white">
                                                    Shop the collection
                                                    <span aria-hidden="true"> &rarr;</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Pagination -->
                                        <div class="flex items-center justify-between border border-t border-gray-200 bg-white px-2 py-2 sm:px-6 dark:bg-gray-700 dark:border-gray-500">
                                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                <div class="flex flex-1 justify-between sm:hidden">
                                                    <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                                                    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-700 dark:text-white">
                                                        顯示第
                                                        <span class="font-medium">{{ $usedbooks->firstItem() }}</span>
                                                        至
                                                        <span class="font-medium">{{ $usedbooks->lastItem() }} </span>
                                                        筆資料，共
                                                        <span class="font-medium">{{ $usedbooks->total() }}</span>
                                                        筆資料
                                                    </p>
                                                </div>
                                                <div>
                                                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                                        <a href="{{ $usedbooks-> previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                            <span class="sr-only">上一頁</span>
                                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ $usedbooks-> nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
