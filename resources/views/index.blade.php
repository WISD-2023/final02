@extends('layouts.master')
@section('title', '首頁')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
                            <h2 class="text-2xl font-bold tracking-tight text-gray-900">首頁 - 功能介紹</h2>
                            <p class="mt-4 text-base text-gray-500">為學校及師生提供更完善的書籍交易網站</p>
                            <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                                <a href="{{ route('usedbook.index') }}" class="group block">
                                    <div aria-hidden="true" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-collection-01.jpg" alt="Brown leather key ring with brass metal loops and rivets on wood table." class="h-full w-full object-cover object-center">
                                    </div>
                                    <h3 class="mt-4 text-base font-semibold text-gray-900">瀏覽二手書專區</h3>
                                    <p class="mt-2 text-sm text-gray-500">Keep your phone, keys, and wallet together, so you can lose everything at once.</p>
                                </a>
                                <a href="{{ route('newbook.index') }}" class="group block">
                                    <div aria-hidden="true" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-collection-02.jpg" alt="Natural leather mouse pad on white desk next to porcelain mug and keyboard." class="h-full w-full object-cover object-center">
                                    </div>
                                    <h3 class="mt-4 text-base font-semibold text-gray-900">瀏覽新書購書專區</h3>
                                    <p class="mt-2 text-sm text-gray-500">The rest of the house will still be a mess, but your desk will look great.</p>
                                </a>
                                <a href="{{ route('teachingmaterials.index') }}" class="group block">
                                    <div aria-hidden="true" class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-collection-03.jpg" alt="Person placing task list card into walnut card holder next to felt carrying case on leather desk pad." class="h-full w-full object-cover object-center">
                                    </div>
                                    <h3 class="mt-4 text-base font-semibold text-gray-900">瀏覽上課指定授課書籍</h3>
                                    <p class="mt-2 text-sm text-gray-500">Be more productive than enterprise project managers with a single piece of paper.</p>
                                </a>
                            </div>
                            <div class="mx-auto max-w-[85rem] px-4 py-16 sm:px-0.5 sm:py-8 lg:max-w-7xl">
                                <div class="relative overflow-hidden rounded-lg lg:h-96">
                                    <div class="absolute inset-0">
                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-featured-collection.jpg" alt="" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div aria-hidden="true" class="relative h-96 w-full lg:hidden"></div>
                                    <div aria-hidden="true" class="relative h-32 w-full lg:hidden"></div>
                                    <div class="absolute inset-x-0 bottom-0 rounded-bl-lg rounded-br-lg bg-black bg-opacity-75 p-6 backdrop-blur backdrop-filter sm:flex sm:items-center sm:justify-between lg:inset-x-auto lg:inset-y-0 lg:w-96 lg:flex-col lg:items-start lg:rounded-br-none lg:rounded-tl-lg">
                                        <div>
                                            <h2 class="text-xl font-bold text-white">教師權限申請</h2>
                                            <p class="mt-1 text-sm text-gray-300">教師上傳指定授課書籍，便於學生在課前更容易備妥上課所需書籍。
                                            </p>
                                        </div>
                                        <a href="#" class="mt-6 flex flex-shrink-0 items-center justify-center rounded-md border border-white border-opacity-25 bg-white bg-opacity-0 px-4 py-3 text-base font-medium text-white hover:bg-opacity-10 sm:ml-8 sm:mt-0 lg:ml-0 lg:w-full">申  請</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


@endsection
