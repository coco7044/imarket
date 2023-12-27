
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品一覧
            </h2>

    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                        @foreach($products as $product)
                        <!-- article - start -->
                        <div class="box flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="{{ route('items.show', ['item' => $product->id,'option'=>' ' ])}}">
                                <span class="flex justify-center">
                                    <x-thumbnail filename="{{$product->filename ?? ''}}" type="products" />
                                </span>
                                <div class="flex bg-gray-100 flex-1 flex-col p-4 sm:p-6">
                                    <p class="mb-2 text-lg font-semibold text-gray-800">
                                        {{ $product->category }}
                                    </p>
                                    <div class="sm:h-32">
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

                    {{ $products->appends([
                        'category' => \Request::get('category'),
                        'sort' => \Request::get('sort'),
                        'pagination' => \Request::get('pagination')
                    ])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
