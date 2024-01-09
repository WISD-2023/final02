@extends('layouts.master')
@section('title', '二手書購書單')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-700">
                    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 ">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ Auth::check() ? Auth::user()->name . ' 的二手書購書單' : '二手書購書單' }}
                                    </h2>
                                    <p class="mt-4 text-base text-gray-500 dark:text-white">
                                        目前有{{ (auth()->check() ? auth()->user()->usedBookCart->count() : '0') }}本二手書
                                    </p>
                                </div>
                            </div>
                            <!-- Products -->
                            <div class="mt-6">
                                <div class="space-y-8">
                                    <div class="border-gray-200 bg-gray-200 sm:rounded-lg dark:bg-gray-800">
                                        @foreach($usedBookCarts as $bookData)
                                        <div class="px-4 py-6 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8 w-240">
                                            <div class="sm:flex lg:col-span-6">
                                                <div class="aspect-h-1 aspect-w-1 w-full flex-shrink-0 overflow-hidden rounded-lg sm:aspect-none sm:h-40 sm:w-40">
                                                    <img src="{{asset('images/' .$bookData['bookImage'])}}" alt="Insulated bottle with white base and black snap lid." class="h-full w-full object-cover object-center sm:h-full sm:w-full">
                                                </div>
                                                <div class="mt-6 sm:ml-6 sm:mt-0">
                                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">
                                                        <a href="#">{{$bookData['bookName']}}</a>
                                                    </h3>
                                                    <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">${{$bookData['bookPrice']}}</p>
                                                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300">{{$bookData['description']}}.</p>
                                                </div>
                                            </div>

                                            <div class="mt-6 lg:col-span-6">
                                                <div class="flex space-x-4">
                                                    <!-- First Block -->
                                                    <div class="w-48">
                                                        <div class="font-medium text-gray-900 dark:text-white">二手書狀況</div>
                                                        <div class="mt-3 text-gray-500 dark:text-gray-300">
                                                            <span class="block">賣家：{{$bookData['username']}}</span>
                                                            <span class="block">書況：{{$bookData['bookState']}}</span>
                                                            <span class="block">庫存：{{$bookData['status']}}</span>
                                                        </div>
                                                    </div>
                                                    <!-- Second Block -->
                                                    <div>
                                                        <div class="font-medium text-gray-900 dark:text-white">付款及配送資訊</div>
                                                        <div class="mt-2 space-y-3 text-gray-500 dark:text-gray-300 w-full">
                                                            <span class="block">付款方式：{{$bookData['payMethod']}}</span>
                                                            <span class="block text-sm whitespace-no-wrap">交易地點：{{$bookData['transaction']}}</span>
                                                            <span class="block text-sm whitespace-no-wrap overflow-ellipsis">交易時間：{{date('Y 年 m 月 d 日', strtotime($bookData['tradeAt']))}}</span>
                                                        </div>
                                                    </div>
                                                    <!-- Third Block -->
                                                    <div class="flex-grow flex items-center justify-end">
                                                        <div class="mt-3 space-y-3 text-gray-500">
                                                            <form action="{{ route('usedbookcart.destroy', ['usedBookCart' => $bookData['bookId']]) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="font-medium text-red-600 hover:text-red-400">刪除</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Billing -->
                            <div class="mt-16">
                                <h2 class="sr-only">Billing Summary</h2>
                                <div class="bg-gray-200 px-4 py-6 sm:rounded-lg sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-8 dark:bg-gray-800">
                                    <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                                        <div>
                                            <dt class="font-medium text-gray-900 dark:text-white">Billing address</dt>
                                            <dd class="mt-3 text-gray-500 dark:text-gray-300">
                                                <span class="block">Floyd Miles</span>
                                                <span class="block">7363 Cynthia Pass</span>
                                                <span class="block">Toronto, ON N3Y 4H8</span>
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-900 dark:text-white">Payment information</dt>
                                            <dd class="-ml-4 -mt-1 flex flex-wrap">
                                                <div class="ml-4 mt-4 flex-shrink-0">
                                                    <svg aria-hidden="true" width="36" height="24" viewBox="0 0 36 24" class="h-6 w-auto">
                                                        <rect width="36" height="24" rx="4" fill="#224DBA" />
                                                        <path d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" fill="#fff" />
                                                    </svg>
                                                    <p class="sr-only">Visa</p>
                                                </div>
                                                <div class="ml-4 mt-4">
                                                    <p class="text-gray-900 dark:text-white">Ending with 4242</p>
                                                    <p class="text-gray-600 dark:text-gray-300">Expires 02 / 24</p>
                                                </div>
                                            </dd>
                                        </div>
                                    </dl>

                                    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-5 lg:mt-0">
                                        <div class="flex items-center justify-between pb-4">
                                            <dt class="text-gray-600 dark:text-gray-300">小計</dt>
                                            <dd class="font-medium text-gray-900 dark:text-white">$72</dd>
                                        </div>
                                        <div class="flex items-center justify-between py-4">
                                            <dt class="text-gray-600 dark:text-gray-300">運費</dt>
                                            <dd class="font-medium text-gray-900 dark:text-white">$5</dd>
                                        </div>
                                        <div class="flex items-center justify-between pt-4">
                                            <dt class="font-medium text-gray-900 dark:text-white">合計訂單</dt>
                                            <dd class="font-medium text-indigo-700 dark:text-indigo-500">$83.16</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
