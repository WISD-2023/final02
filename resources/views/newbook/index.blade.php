@extends('layouts.master')
@section('title', '新書列表')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                            <div class="px-4 sm:px-6 lg:px-8">
                                <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">新書列表</h2>
                                        <p class="mt-4 text-base text-gray-500">可瀏覽學校販售之書籍資訊，並即時添加至購書單中。</p>
                                    </div>
                                    <div class="mt-4 sm:mt-0">
                                        <form action="{{ route('newbooks.search') }}" method="GET">
                                            <div class="flex items-center">
                                                <input type="text" name="search" id="search" placeholder="搜尋書名" class="border rounded-md border-gray-200 py-1 px-2 mr-2">
                                                <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded-md">搜尋</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-8 flow-root">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-300">
                                                    <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">編號</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">書籍名稱</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">作者</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">出版項</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">中文圖書分類</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ISBN</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">庫存量</th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">單價</th>
                                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                            <span class="text-sm">操作</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200 bg-white">
                                                    @foreach($newbooks as $newbook)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $newbook->  id}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  name}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  author}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  pp}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  category_id}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  isbn}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  quantity}}</td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $newbook->  price}}</td>
                                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">加入購書單<span class="sr-only">, Lindsay Walton</span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <!-- Pagination -->
                                                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-2 py-2 sm:px-6">
                                                    <div class="flex flex-1 justify-between sm:hidden">
                                                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                                                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                                                    </div>
                                                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                                        <div>
                                                            <p class="text-sm text-gray-700">
                                                                顯示第
                                                                <span class="font-medium">{{ $newbooks->firstItem() }}</span>
                                                                至
                                                                <span class="font-medium">{{ $newbooks->lastItem() }} </span>
                                                                筆資料，共
                                                                <span class="font-medium">{{ $newbooks->total() }}</span>
                                                                筆資料
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                                                <a href="{{ $newbooks-> previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                                    <span class="sr-only">上一頁</span>
                                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </a>
                                                                <a href="{{ $newbooks-> nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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
        </div>
    </div>


@endsection
