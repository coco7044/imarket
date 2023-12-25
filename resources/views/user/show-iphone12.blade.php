<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品の詳細
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <x-flash-message status="session('alert')" /> 
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
                            <form method="post" action="{{ route('user.cart.add')}}">
                                @csrf
                                <div class="bg-white py-6 sm:py-8 lg:py-12">
                                    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                                        <div class="grid gap-8">
                                            <!-- content - start -->
                                            <div class="md:py-8">
                                                <!-- name - start -->
                                                <div class="mb-2 md:mb-3">
                                                    <span class="mb-0.5 inline-block text-gray-500">{{ $product->category->name }}</span>
                                                    <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">{{ $product->name }}</h2>
                                                </div>
                                                <!-- name - end -->

                                                @if($count > 1)
                                                    <a href="{{ route('user.items.more',['item'=>$product->id,'color'=>$product->color,'capacity'=>$product->capacity]) }}" class="tags">もっと見る</a>
                                                @endif

                                                <!-- color - start -->
                                                <div class="mb-4 md:mb-6 pt-8">
                                                    <span class="mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">カラー</span>
                                                    <div class="flex flex-wrap gap-2" id="color">
                                                        <a nama="color" value="black" @if($product->color === 'black') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'black']) }}" @endif class="@if($product->color === 'black')h-8 w-8 rounded-full border black ring-2 ring-gray-800 @else h-8 w-8 black rounded-full border  ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                        <a nama="color" value="blue" @if($product->color === 'blue') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'blue']) }}" @endif class="@if($product->color === 'blue')h-8 w-8 rounded-full border blue ring-2 ring-gray-800 @else h-8 w-8 blue rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                        <a nama="color" value="red" @if($product->color === 'red') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'red']) }}" @endif class="@if($product->color === 'red')h-8 w-8 rounded-full border red ring-2 ring-gray-800 @else h-8 w-8 red rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                        <a nama="color" value="purple" @if($product->color === 'purple') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'purple']) }}" @endif class="@if($product->color === 'purple')h-8 w-8 rounded-full border purple ring-2 ring-gray-800 @else h-8 w-8 purple rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                        <a nama="color" value="rightGreen" @if($product->color === 'rightGreen') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'rightGreen']) }}" @endif class="@if($product->color === 'rightGreen')h-8 w-8 rounded-full border rightGreen ring-2 ring-gray-800 @else h-8 w-8 rightGreen rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                        <a nama="color" value="white" @if($product->color === 'white') href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>'white']) }}" @endif class="@if($product->color === 'white')h-8 w-8 rounded-full border white ring-2 ring-gray-800 @else h-8 w-8 white rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-400 @endif"></a>
                                                    </div>
                                                </div>
                                                <!-- color - end -->

                                                <!-- size - start -->
                                                <div class="mb-8 md:mb-10">
                                                    <span class="mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">容量(GB)</span>
                                                    <div class="flex justify-around gap-3" id="capacity">
                                                        <a nama='64GB'  @if($product->capacity === 64) href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>64]) }}" @endif @if($product->capacity === 64) class="bg-gray-200 flex h-12 w-full items-center justify-center rounded-md border text-center text-sm font-semibold text-gray-800 transition duration-100" @else class="flex h-12 w-full items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200" @endif>64GB</a>
                                                        <a nama='128GB' @if($product->capacity === 128) href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>128]) }}" @endif @if($product->capacity === 128) class="bg-gray-200 flex h-12 w-full items-center justify-center rounded-md border text-center text-sm font-semibold text-gray-800 transition duration-100" @else class="flex h-12 w-full items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200" @endif>128GB</a>
                                                        <a nama='256GB' @if($product->capacity === 256) href="javascript:void(0)" @else href="{{ route('user.items.show',['item'=>$product->id,'option'=>256]) }}" @endif @if($product->capacity === 256) class="bg-gray-200 flex h-12 w-full items-center justify-center rounded-md border text-center text-sm font-semibold text-gray-800 transition duration-100" @else class="flex h-12 w-full items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200" @endif>256GB</a>
                                                    </div>
                                                </div>
                                                <!-- size - end -->

                                                <!-- price - start -->
                                                <div class="mb-4">
                                                    <div class="flex items-end gap-2">
                                                        <span class="text-xl font-bold text-gray-800 md:text-2xl">{{ number_format($product->price) }}</span><span class="text-sm text-gray-700">円(税込)</span>
                                                    </div>
                                                </div>
                                                <!-- price - end -->

                                                <!-- buttons - start -->
                                                <div class="flex mt-10 items-center">
                                                    <span class="p-3 mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">数量</span>
                                                    <div class="relative">
                                                        <select name="quantity" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                                            @for ($i = 1; $i <= $quantity; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>  
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="pt-4 flex justify-end">
                                                    <button class="flex justify-center ml-auto shadow-lg px-2 py-1 w-1/2 bg-blue-400 text-lg text-white font-semibold rounded  hover:bg-blue-500 hover:shadow-sm hover:translate-y-0.5 transform transition">カートに入れる</button>
                                                    <input type="hidden" name="product_id" value="{{ $product->id}}">                                                
                                                </div>
                                                <!-- buttons - end -->
                                            </div>
                                        <!-- content - end -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>