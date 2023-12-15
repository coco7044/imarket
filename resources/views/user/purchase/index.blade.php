<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入履歴
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-flash-message status="purchaseCancel" />
                <h2 class="mt-10 mb-10 flex justify-center font-semibold text-xl text-gray-800 leading-tight">
                    購入履歴一覧
                </h2>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($histories) > 0)
                        @foreach ($histories as $history )
                        <div class="border-b-2 md:flex md:justify-around md:items-center mb-2">
                            <div class="fadeIn md:w-1/12">
                                @if ($history->filename !== null)
                                    <img src="{{ asset('storage/products/' . $history->filename )}}">
                                @else
                                    <img src="">
                                @endif
                            </div>
                            <div class="md:w-3/12">
                                <a class="tags" href="{{ route('user.items.show',['item' => $history->id]) }}">{{ $history->name }}</a>
                            </div>
                            <div>
                                <div>数量：{{ $history->quantity }}個</div>
                                <div>価格：{{ number_format($history->quantity * $history->purchase_product_price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                                <div>購入日時：{{ $history->created_at }}</div>
                                <div>注文ID：{{ $history->pid }}</div>
                            </div>
                                @if($history->status === 0)
                                    <div>
                                        <div class="md:flex md:justify-center" >購入済み</div>
                                        <button type="button" onclick="location.href='{{ route('user.purchase.cancel',['purchase_id' => $history->pid])}}'" class="box bg-slate-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">キャンセル</button>
                                    </div>
                                @else
                                    <div class="px-4 text-lg">キャンセル済み</div>
                                @endif
                        </div>
                        @endforeach
                    @else
                        購入履歴はありません
                    @endif
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
