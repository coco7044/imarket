<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('商品価格調査') }}
    </h2>
</x-slot>

<div class="fadeIn py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />  
            <form method="post" action="{{ route('admin.priceSearch.store')}}" >
                @csrf
                <div class="p-2 w-1/2 mx-auto">
                    <label for="category" class="leading-7 text-x text-gray-600">検索サイト</label>
                        <div class="flex pt-4 pb-8 justify-around">
                            <div>
                                <input id="backMarket" type="checkbox" value="backMarket" checked>
                                <label for="backMarket">BackMarket</label>
                            </div>

                            <div>
                                <input id="toggle2" type="checkbox">
                                <label for="toggle2">Hey, me too!</label>
                            </div>

                            <div>
                                <input id="toggle3" type="checkbox">
                                <label for="toggle3">Toggle party!</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="pb-8 relative">
                            <label for="category" class="leading-7 text-x text-gray-600">カテゴリー</label>
                            <div class="pt-4">
                                <select name="category" id="category" class=" w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                    @foreach($category->secondary as $secondary)
                                    <option value="{{ $secondary->id}}" >
                                        {{ $secondary->name }}
                                    </option>
                                    @endforeach
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-1/2 pb-8 mx-auto">
                    <label for="search" class="leading-7 text-x text-gray-600">出力形式</label>
                        <div class="relative pt-4 flex justify-around">
                            <div><input type="radio" name="search" value="0" class="mr-2" checked>画面表示</div>
                            <div><input type="radio" name="search" value="1" class="mr-2" >メール送信</div>
                            <div><input type="radio" name="search" value="2" class="mr-2" >両方</div>
                        </div>
                    </div>
                    <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('admin.dashboard')}}'" class="box bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-300 rounded text-lg">戻る</button>
                        <button type="submit" class="box text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout> 