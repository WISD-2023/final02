@extends('layouts.master')
@section('title', $usedbook->name)
@section('page-content')
    <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 dark:bg-gray-700">
                    <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                        <!-- Image gallery -->
                        <div class="flex flex-col-reverse">
                            <div class="aspect-h-1 aspect-w-1 w-full">
                                <!-- Tab panel, show/hide based on tab state. -->
                                <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                    <img
                                        src="{{asset('images/'.$usedbook->book_image)}}"
                                        alt="Angled front view with bag zipped and handles upright."
                                        class="h-full w-full object-cover object-center sm:rounded-lg">
                                </div>
                            </div>
                        </div>

                        <!-- Product info -->
                        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{$usedbook->name}}</h1>

                            <div class="mt-3">
                                <h2 class="sr-only">Product price</h2>
                                <p class="text-3xl tracking-tight text-gray-900 dark:text-white">${{$usedbook->price}}</p>
                            </div>

                            <div class="mt-6">
                                <h3 class="sr-only">Description</h3>

                                <div class="space-y-6 text-base text-gray-700 dark:text-white">
                                    <p></p>
                                </div>
                            </div>

                            <form action="{{ route('usedbookcart.addCart',$usedbook ) }}" method="POST" role="form" class="mt-6">
                                @method('POST')
                                @csrf
                                <div class="mt-10 flex">
                                    @if(auth()->check() && auth()->user()->name == $usedbook->user->name)
                                        <button type="submit"
                                                class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-gray-500 px-8 py-3 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full"
                                                disabled>
                                            加入二手書購書單
                                        </button>
                                    @else
                                        <button name="usedbook" type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">
                                            加入二手書購書單
                                        </button>
                                    @endif
                                </div>
                            </form>

                            <div class="hs-accordion-group" data-hs-accordion-always-open>
                                <div class="hs-accordion active" id="hs-basic-always-open-heading-one">
                                    <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400" aria-controls="hs-basic-always-open-collapse-one">
                                        <svg class="hs-accordion-active:hidden block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        <svg class="hs-accordion-active:block hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                        書籍資訊
                                    </button>
                                    <div id="hs-basic-always-open-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-always-open-heading-one">
                                        <p class="text-gray-800 dark:text-gray-200">
                                            書名：{{$usedbook->name}}<br/>
                                            作者：{{$usedbook->author}}<br/>
                                            出版社：{{$usedbook->pp}}<br/>
                                            ISBN：{{$usedbook->isbn}}<br/>
                                        </p>
                                    </div>
                                </div>

                                <div class="hs-accordion" id="hs-basic-always-open-heading-two">
                                    <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400" aria-controls="hs-basic-always-open-collapse-two">
                                        <svg class="hs-accordion-active:hidden block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        <svg class="hs-accordion-active:block hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                        二手書狀態
                                    </button>
                                    <div id="hs-basic-always-open-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-always-open-heading-two">
                                        <p class="text-gray-800 dark:text-gray-200">
                                            賣家：{{$usedbook->user->name}}<br/>
                                            書況：{{$usedbook->book_state}}<br/>
                                            書況描述：{{$usedbook->description}}<br/>
                                        </p>
                                    </div>
                                </div>

                                <div class="hs-accordion" id="hs-basic-always-open-heading-three">
                                    <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400" aria-controls="hs-basic-always-open-collapse-three">
                                        <svg class="hs-accordion-active:hidden block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        <svg class="hs-accordion-active:block hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
                                        付款及配送資訊
                                    </button>
                                    <div id="hs-basic-always-open-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-always-open-heading-three">
                                        <p class="text-gray-800 dark:text-gray-200">
                                            付款方式：{{$paymethod}}<br/>
                                            交易地點：{{$transaction}}<br/>
                                            交易時間：{{date('Y 年 m 月 d 日', strtotime($usedbook->trade_at))}}<br/>
                                        </p>
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
