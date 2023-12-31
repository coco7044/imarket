<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="fadeIn py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />  
            <form method="post" action="{{ route('admin.products.store')}}" >
                @csrf
                <div class="-m-2">
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">商品名 ※必須</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="price" class="leading-7 text-sm text-gray-600">価格 ※必須</label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="quantity" class="leading-7 text-sm text-gray-600">初期在庫 ※必須</label>
                                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                    <div class="p-2 w-1/2 mx-auto">
                    </div> 
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                            <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach($category->secondary as $secondary)
                                        <option value="{{ $secondary->id}}" >
                                            {{ $secondary->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="color" class="leading-7 text-sm text-gray-600">カラー</label>
                            <select name="color" id="color" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="none" >
                                    無し
                                </option>
                                <option value="blue" >
                                    ブルー
                                </option>
                                <option value="black" >
                                    ブラック
                                </option>
                                <option value="purple" >
                                    パープル
                                </option>
                                <option value="rightGreen" >
                                    ライトグリーン
                                </option>
                                <option value="white" >
                                    ホワイト
                                </option>
                                <option value="pink" >
                                    ピンク
                                </option>
                                <option value="green" >
                                    グリーン
                                </option>
                                <option value="gold" >
                                    ゴールド
                                </option>
                                <option value="silver" >
                                    シルバー
                                </option>
                                <option value="gray" >
                                    グレー
                                </option>
                                <option value="yellow" >
                                    イエロー
                                </option>
                                <option value="red" >
                                    レッド
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="capacity" class="leading-7 text-sm text-gray-600">容量(GB)</label>
                            <select name="capacity" id="capacity" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="0" >
                                    無し
                                </option>
                                <option value="64" >
                                    64GB
                                </option>
                                <option value="128" >
                                    128GB
                                </option>
                                <option value="256" >
                                    256GB
                                </option>
                                <option value="512" >
                                    512GB
                                </option>
                                <option value="1000" >
                                    1000GB
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-8">
                        <x-select-image :images="$images" name="image1" />
                        <x-select-image :images="$images" name="image2" />
                        <x-select-image :images="$images" name="image3" />
                        <x-select-image :images="$images" name="image4" />
                    <div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative flex justify-around">
                            <div><input type="radio" name="is_selling" value="1" class="mr-2" checked>販売中</div>
                            <div><input type="radio" name="is_selling" value="0" class="mr-2" >停止中</div>
                        </div>
                    </div>
                    <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('admin.products.index')}}'" class="box bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                        <button type="submit" class="box text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    'use strict'
    const images = document.querySelectorAll('.image');
    images.forEach(image => {
        image.addEventListener('click', (element) => {
            const imageName = element.target.dataset.id.substr(0, 6);
            const imageId = element.target.dataset.id.replace(imageName + '_', '');
            const imageFile = element.target.dataset.file;
            const imagePath = element.target.dataset.path;

            document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile;
            document.getElementById(imageName + '_hidden').value = imageId;

            /**
             * MicroModal.close(modal);でモーダルを閉じるとimage4に適切な画像が配置出来なくなるのでis-openクラスを削除してモーダルを閉じる
             * モーダルが開いている間はariaHiddenがfalseになるので閉じるタイミングでtrueに変更する
             * モーダル表示時にbodyのoverflow属性にhiddenが設定されるので削除する
             */
            const openModal = document.getElementsByClassName('is-open')[0];
            openModal.ariaHidden = true;
            openModal.classList.remove('is-open');
            document.getElementsByTagName('body')[0].style.overflow = '';
        })
    });
</script>

</x-app-layout> 