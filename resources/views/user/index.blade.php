<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" /> 
                    <div class="p-2 mt-4 flex justify-end w-full">
                    </div>
                    <div class="flex flex-wrap">
                    @foreach ($products as $product )
                    <div class="w-1/4 p-2 md:p-4">
                            <div class="border rounded-md p-2 md:p-4">
                                <x-thumbnail filename="{{$product->imageFirst->filename ?? ''}}" type="products" />
                                <div class="text-gray-700">{{ $product->name }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>