@extends('layouts.backstage')
@section('title', '授課書籍列表')
@section('page-content')

    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-[88rem] px-4 py-16 sm:px-6 sm:py-16 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">授課書籍列表</h2>
                        <p class="mt-4 text-base text-gray-500 dark:text-white">教師授課書籍資訊總表。</p>
                    </div>
                    <div class="mt-6 sm:mt-0 flex flex-col sm:flex-row items-center">
                        <form action="{{ route('backstage.teachingmaterial.search') }}" method="GET" class="flex items-center mb-2 sm:mb-0">
                            <input type="text" name="search" id="search" placeholder="搜尋授課書名" class="border rounded-md border-gray-200 dark:bg-gray-700 dark:border-gray-400 py-1 px-2 mr-2">
                            <button type="submit" class="bg-blue-600 text-white dark:text-gray-200 px-4 py-1 rounded-md">搜尋</button>
                        </form>

                        <a href="{{ route('backstage.teachingmaterial.create') }}" class="bg-blue-600 text-white dark:text-gray-200 px-4 py-1 mt-2 sm:mt-0 ml-2 rounded-md flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            新增授課書籍
                        </a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50 dark:bg-gray-600">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 sm:pl-6">編號</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">書籍名稱</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">課程名稱</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">教師名稱</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            <span class="text-sm">操作功能</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-500 dark:divide-gray-400">
                                    @foreach($teachingmaterials as $teachingmaterial)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-6">{{ $teachingmaterial->  id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-200">{{ ($teachingmaterial->newbook)->name  }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-200">{{ $teachingmaterial->  name}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-200">{{ optional($teachingmaterial->users)->name }}</td>

                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500  dark:text-gray-200 flex items-center">
                                                <a href="{{ route('backstage.teachingmaterial.edit', $teachingmaterial) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-sky-500">編輯<span class="sr-only">, Lindsay Walton</span></a>
                                                |
                                                <form action="{{ route('backstage.teachingmaterial.destroy', $teachingmaterial) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-600 hover:text-indigo-900 dark:text-red-500">
                                                        刪除
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination --><div class="flex items-center justify-between border-t border-gray-200 bg-white dark:bg-gray-600 px-2 py-2 sm:px-6">
                                    <div class="flex flex-1 justify-between sm:hidden">
                                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                                    </div>
                                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm text-gray-700 dark:text-gray-200">
                                                顯示第
                                                <span class="font-medium">{{ $teachingmaterials->firstItem() }}</span>
                                                至
                                                <span class="font-medium">{{ $teachingmaterials->lastItem() }} </span>
                                                筆資料，共
                                                <span class="font-medium">{{ $teachingmaterials->total() }}</span>
                                                筆資料
                                            </p>
                                        </div>
                                        <div>
                                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                                <a href="{{ $teachingmaterials-> previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                    <span class="sr-only">上一頁</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a href="{{ $teachingmaterials-> nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
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

@endsection
