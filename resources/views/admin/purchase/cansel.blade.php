<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        キャンセル商品一覧
    </h2>
</x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        @foreach ($histories as $history )
                        <div class="border-b-2 md:flex md:justify-around md:items-center mb-2">
                            <div class="fadeIn md:w-1/12">
                                @if ($history->filename !== null)
                                    <img src="{{ asset('storage/products/' . $history->filename )}}">
                                @else
                                    <img src="">
                                @endif
                            </div>
                            <div>
                                <div>{{ $history->name }}</div>
                            </div>
                            <div>
                                <div>数量：{{ $history->quantity }}個</div>
                                <div>価格：{{ number_format($history->quantity * $history->purchase_product_price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                                <div>購入日時：{{ $history->created_at }}</div>
                                <div>注文ID：{{ $history->pid }}</div>
                            </div>
                        </div>
                        @endforeach
                        <div class="flex pb-8 flex-row-reverse">
                            <x-cansel-purcahse :history="$history"/>
                        </div>
                            {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
