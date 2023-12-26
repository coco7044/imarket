    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品管理
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" /> 
                    <div class="p-2 mt-4 flex justify-end w-full">
                    <button onclick="location.href='{{ route('admin.products.create')}}'" class="box mb-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">商品の新規登録</button>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                    @foreach($products as $product)
                    <!-- article - start -->
                    <div class="box flex flex-col overflow-hidden rounded-lg border bg-white">
                        <a href="{{ route('admin.products.edit', ['product' => $product->id])}}">  
                            <span class="flex justify-center">
                                <x-thumbnail filename="{{$product->imageFirst->filename ?? ''}}" type="products" />
                            </span>
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <div class="sm:h-20">
                                    <h2 class="mb-8 text-gray-500">{{ $product->name }}</h2>
                                </div>
                                <div>
                                    <p class="text-xl mt-1">￥{{ number_format($product->price) }}<span class="text-xl text-gray-700">円(税込)</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- article - end -->
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
