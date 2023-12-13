@extends('layouts.master')
@section('title', '首頁')
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
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
                        </div>
                    </div>
            </div>
        </div>
    </div>


@endsection
