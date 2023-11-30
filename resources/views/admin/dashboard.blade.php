<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap -m-4 text-center">
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <a href="{{ route('admin.products.create')}}">  
                            <div class="box border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg  class="text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"></path>
                            </svg>                        
                            <h2 class="title-font font-medium text-3xl text-gray-900">新規商品登録</h2>
                            </div>
                        </a>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <a href="{{ route('admin.images.create')}}">  
                            <div class="box border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">新規画像登録</h2>
                            </div>
                        </a>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <a href="">  
                            <div class="box border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">購入者履歴</h2>
                            </div>
                        </a>
                        </div>
                        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <a href="{{ route('admin.priceSearch.index')}}">  
                            <div class="box border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-gray-900">商品価格調査</h2>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
</x-app-layout>
