@extends('layouts.master')
@section('title', $usedbookItem->name)
@section('page-content')
    <div class="py-8">
        <div class="max-w-[88rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                            <div class="px-4 sm:px-6 lg:px-8">
                                <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{$usedbookItem->name}}</h2>
                                    </div>
                                </div>
                                <table class="w-full ">
                                    <tr>
                                        <td>{{$usedbookItem->name}}</td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
