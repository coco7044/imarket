<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        購入者履歴
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="flex flex-col text-center w-full mb-10">
                                <h1 class="sm:text-2xl text-3xl font-medium title-font mb-2 text-gray-900">購入者履歴</h1>
                            </div>
                            <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                                <table class="table-auto mb-10 w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">購入者名</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">金額</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">購入日</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $purchases as $purchase)
                                        <tr class="border-b border-gray-200" >
                                            <td class="px-4 py-3"><a class="tags" href="{{ route('admin.purchase.show',['purchase'=>$purchase->id]) }}">{{ $purchase->id }}</a></td>
                                            <td class="px-4 py-3">{{ $purchase->kana }}</td>
                                            <td class="px-4 py-3">{{ $purchase->tel }}</td>
                                            <td class="px-4 py-3">{{ number_format($purchase->total) }}円(税込)</td>
                                            <td class="px-4 py-3">{{ $purchase->created_at }}</td>
                                            @if($purchase->status === 0)
                                                <td class="px-4 py-3">購入済み</td>
                                            @else
                                                <td class="px-4 py-3">キャンセル済み</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                                {{ $purchases->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
