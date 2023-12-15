<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品の詳細
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex md:justify-around">
                        <div class="md:w-1/2 flex justify-center items-center">
                            <!-- Slider main container -->
                            <div class="swiper-container">
                            <!-- Additional required wrapper -->
                                <div class="fadeIn swiper-wrapper">
                                <!-- Slides -->
                                    @if ($product->imageFirst !== null)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/products/' . $product->imageFirst->filename )}}">
                                        <img src="">
                                    </div>
                                    @endif
                                    @if ($product->imageSecond !== null)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/products/' . $product->imageSecond->filename )}}">
                                        <img src="">
                                    </div>
                                    @endif
                                    @if ($product->imageThird !== null)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/products/' . $product->imageThird->filename )}}">
                                        <img src="">
                                    </div>
                                    @endif
                                    @if ($product->imageFourth !== null)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/products/' . $product->imageFourth->filename )}}">
                                        <img src="">
                                    </div>
                                    @endif
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>

                        <div class="md:w-1/2 ml-4">
                            <h2 class="mb-4 text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}</h2>
                            <h1 class="mb-4 text-gray-900 text-3xl title-font font-medium">{{ $product->name }}</h1>
                            <div>
                                <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}</span><span class="text-sm text-gray-700">円(税込)</span>
                            </div>
                            <form method="post" action="{{ route('user.cart.add')}}">
                                @csrf
                                <div class="flex mt-10 items-center">
                                    <span class="mr-3">数量</span>
                                    <div class="relative">
                                        <select name="quantity" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                            @for ($i = 1; $i <= $quantity; $i++)
                                                <option value="{{$i}}">{{$i}}</option>  
                                            @endfor
                                        </select>
                                    </div>
                                    <button class="flex ml-auto shadow-lg px-2 py-1  bg-blue-400 text-lg text-white font-semibold rounded  hover:bg-blue-500 hover:shadow-sm hover:translate-y-0.5 transform transition">カートに入れる</button>
                                    <input type="hidden" name="product_id" value="{{ $product->id}}">
                                </div>
                            </form>
                            <div class="pt-5 border-b-4"></div>
                            <div class="pt-5">
                                <span class="font-bold">容量(GB)</span>
                                <div class="pt-5 flex justify-around ">
                                    <a href="/" class="md:w-3/12 bn3637 bn36">64GB</a>
                                    <a href="/" class="md:w-3/12 bn3637 bn36">124GB</a>
                                    <a href="/" class="md:w-3/12 bn3637 bn36">256GB</a>
                                </div>
                                <span class="font-bold">カラー</span>
                                <div class="justify-around">
                                    <div class="pt-5 flex justify-around">
                                        <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle black"></p>
                                            <p class="pl-2">ミッドナイト</p>
                                        </a>
                                        <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle green"></p>
                                            <p class="pl-2">グリーン</p>
                                        </a>
                                        <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle red"></p>
                                            <p class="pl-2">レッド</p>
                                        </a>
                                    </div>
                                    <div class="pt-5 flex justify-around">
                                    <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle blue"></p>
                                            <p class="pl-2">ブルー</p>
                                        </a>
                                        <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle pink"></p>
                                            <p class="pl-2">ピンク</p>
                                        </a>
                                        <a href="/" class=" md:w-3/12 bn3637 bn36">
                                            <p class="circle white"></p>
                                            <p class="pl-2">スターライト</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>