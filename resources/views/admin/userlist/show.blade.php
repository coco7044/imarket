<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        会員情報
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="fadeIn">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <section class="text-gray-600 body-font relative">
                                        <h2 class="flex pb-8 justify-center font-semibold text-xl text-gray-800 leading-tight">
                                            会員情報
                                        </h2>

                                        <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                                            <dl class="-my-3 divide-y divide-gray-100 text-sm">
                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">名前</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->name }}</dd>
                                                </div>

                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">フリガナ</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->kana }}</dd>
                                                </div>

                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">電話番号</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->tel }}</dd>
                                                </div>

                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">メールアドレス</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->email }}</dd>
                                                </div>

                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">郵便番号</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->postcode }}</dd>
                                                </div>

                                                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                                <dt class="font-medium text-gray-900">住所</dt>
                                                <dd class="text-gray-700 sm:col-span-2">{{ $user[0]->address }}</dd>
                                                </div>
                                            </dl>
                                        </div>                    
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>