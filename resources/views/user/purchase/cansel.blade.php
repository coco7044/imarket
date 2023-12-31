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
                                <a class="tags" href="{{ route('user.items.show',['item' => $history->id,'option'=>' ']) }}">{{ $history->name }}</a>
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
                            <div class="modal modalindex2 micromodal-slide" id="modal-1" aria-hidden="true">
                                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                                        <header class="modal__header">
                                            <h2 class=" text-xl text-gray-700 modal__title" id="modal-1-title">
                                                キャンセル確認
                                            </h2>
                                            <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                                        </header>

                                        <main class=" modal__content" id="modal-1-content">
                                            <p>
                                                キャンセルしてよろしいですか？
                                            </p>

                                        </main>
                                        <footer class="modal__footer">
                                            <button type="button" onclick="location.href='{{ route('user.purchase.edit',['purchase_id' => $history->pid])}}'" class="modal__btn bg-indigo-300 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-400 rounded">確定</button>
                                            <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                            <a data-micromodal-trigger="modal-1" href='javascript:;' class="modalindex1 inline-block rounded bg-red-600 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none active:bg-red-500">キャンセルする</a>
                        </div>
                            {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
