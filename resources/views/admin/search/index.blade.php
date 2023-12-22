<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        調査結果
        </h2>
    </x-slot>
    <div class="fadeIn py-4" @if(!empty($backItems->toArray())) style="" @else style="display:none" @endif>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="flex flex-col text-center w-full mb-10">
                                <h1 class="sm:text-2xl text-3xl font-medium title-font mb-2 text-gray-900">BackMarket</h1>
                            </div>

                            <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                                <table class="table-fixed mb-10 w-full whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 text-left title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                                            <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">金額</th>
                                            <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カラー</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $backItems as $item)
                                        <tr class="border-b border-gray-200" >
                                            <td class="px-4 py-3 text-left">{{ $item->title }}</td>
                                            <td class="px-4 py-3 text-center">{{ number_format($item->price) }}円</td>
                                            <td class="px-4 py-3 text-center">{{ $item->color }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="fadeIn py-4" @if(!empty($geoItems->toArray())) style="" @else style="display:none" @endif>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="flex flex-col text-center w-full mb-10">
                                <h1 class="sm:text-2xl text-3xl font-medium title-font mb-2 text-gray-900">ゲオオンライン</h1>
                            </div>

                            <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                                <table class="table-fixed mb-10 w-full whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 text-left title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                                            <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">金額</th>
                                            <th class="px-4 py-3 text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カラー</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $geoItems as $item)
                                        <tr class="border-b border-gray-200" >
                                            <td class="px-4 py-3 text-left">{{ $item->title }}</td>
                                            <td class="px-4 py-3 text-center">{{ number_format($item->price) }}円</td>
                                            <td class="px-4 py-3 text-center">{{ $item->color }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
