<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            注文詳細
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="fadeIn max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-flash-message status="purchaseCancel" />
                <h2 class="mt-10 mb-10 flex justify-center font-semibold text-xl text-gray-800 leading-tight">
                    注文番号：{{ $purchase_id }}
                </h2>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($purchases) > 0)
                        @foreach ($purchases as $purchase )
                        <div class="border-b-2 md:flex md:justify-around md:items-center mb-2">
                            <div class="md:w-1/12">
                                @if ($purchase->filename !== null)
                                    <img src="{{ asset('storage/products/' . $purchase->filename )}}">
                                @else
                                    <img src="">
                                @endif
                            </div>
                            <div class="md:w-3/12">
                                {{ $purchase->name }}
                            </div>
                            <div>
                                <div>数量：{{ $purchase->quantity }}個</div>
                                <div>価格：{{ number_format($purchase->quantity * $purchase->purchase_product_price )}}<span class="text-sm text-gray-700">円(税込)</span></div>
                                <div>購入日時：{{ $purchase->created_at }}</div>
                            </div>
                        </div>
                        @endforeach
                        <div class="flex justify-end">
                            <a class=" inline-block rounded bg-red-600 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none active:bg-red-500" href="{{ route('admin.adminPurchase.cancel',['purchase_id'=>$purchase_id]) }}">
                                キャンセル
                            </a>
                        </div>
                    @else
                        購入履歴はありません
                    @endif
                    {{ $purchases->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="fadeIn">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <h2 class="flex pb-8 justify-center font-semibold text-xl text-gray-800 leading-tight">
                            会員情報
                        </h2>
                        <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                            <dl class="-my-3 divide-y divide-gray-100 text-sm">
                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">名前</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $userData[0]->name }}</dd>
                                </div>

                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">フリガナ</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $userData[0]->kana }}</dd>
                                </div>

                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">電話番号</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $userData[0]->tel }}</dd>
                                </div>

                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">郵便番号</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $userData[0]->postcode }}</dd>
                                </div>

                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">住所</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ $userData[0]->address }}</dd>
                                </div>
                            </dl>
                        </div>                    
                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
