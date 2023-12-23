<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        購入履歴
    </h2>
</x-slot>

    <div class=" fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($products) > 0)
                        @foreach ($products as $product )
                        <div class="border-b-2 md:flex md:justify-around md:items-center mb-2">
                            <div class="fadeIn md:w-1/12">
                                @if ($product->imageFirst->filename !== null)
                                <img src="{{ asset('storage/products/' . $product->imageFirst->filename )}}">
                                @else
                                    <img src="">
                                @endif
                            </div>
                            <div class="md:w-3/12">
                                <a class="tags" href="{{ route('user.items.show',['item' => $product->id]) }}">{{ $product->name }}</a>
                            </div>
                            <div>
                                <div>数量：{{ $product->pivot->quantity }}個</div>
                                <div>価格：{{ number_format($product->pivot->quantity * $product->price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                            </div>
                            <div class="foo pb-2 md:w-2/12">
                                <form method="post" action="{{route('user.cart.delete', ['item' => $product->id ])}}">
                                    @csrf
                                    <button class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="px-1">削除</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <div class="py-4 foo">
                            小計: {{ number_format($totalPrice)}}円(税込)
                        </div>
                        <div>
                            <button onclick="location.href='{{ route('user.cart.checkoutInfo')}}'" class="flex box ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                購入する
                            </button>
                        </div>
                    @else
                        カートに商品が入っていません。
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
