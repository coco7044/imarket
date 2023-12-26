
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                商品一覧
            </h2>
                <form method="get" action = "{{ route('items.index')}}">
                    <div class="lg:flex lg:justify-around">
                        <div class="lg:flex items-center">
                            <select name="category" class="mb-2 lg:mb-0 lg:mr-2">
                                <option value="0" @if(\Request::get('category') === '0') selected @endif>全て</option>
                                @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                <option value="{{ $category->name }}" @if(\Request::get('category') == $category->name) selected @endif >
                                    {{ $category->name }}全て
                                </option>
                                    @foreach($category->secondary as $secondary)
                                        <option value="{{ $secondary->id}}" @if(\Request::get('category') == $secondary->id) selected @endif >
                                            {{ $secondary->name }}
                                        </option>
                                    @endforeach
                                @endforeach  
                            </select>
                            <div class="flex space-x-2 items-center">
                                <div><input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力"></div>
                                <div><button class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button></div>
                            </div>
                        </div>
                    <div class="flex">
                        <div>
                            <span class="text-sm">表示順</span><br>
                            <select id="sort" name="sort" class="mr-4">
                                <option value="{{ \Constant::SORT_ORDER['later']}}"
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['later'] ) 
                                    selected 
                                    @endif>新しい順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['older']}}"
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['older'] ) 
                                    selected 
                                    @endif>古い順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['higherPrice']}}" 
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['higherPrice'] ) 
                                    selected 
                                    @endif>料金の高い順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['lowerPrice']}}"
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice'] ) 
                                    selected 
                                    @endif>料金の安い順    
                                </option>
                            </select>
                        </div>
                        <div>
                            <span class="text-sm">表示件数</span><br>
                            <select id="pagination" name="pagination">
                                <option value="20"
                                    @if(\Request::get('pagination') === '20')
                                    selected
                                    @endif>20件
                                </option>
                                <option value="50"
                                    @if(\Request::get('pagination') === '50')
                                    selected
                                    @endif>50件
                                </option>
                                <option value="100"
                                    @if(\Request::get('pagination') === '100')
                                    selected
                                    @endif>100件
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                    @foreach($products as $product)
                    <!-- article - start -->
                    <div class="box flex flex-col overflow-hidden rounded-lg border bg-white">
                        <a href="{{ route('items.show', ['item' => $product->id,'option'=>' ' ])}}">
                            <span class="flex justify-center">
                                <x-thumbnail filename="{{$product->filename ?? ''}}" type="products" />
                            </span>
                            <div class="flex bg-gray-100 flex-1 flex-col p-4 sm:p-6">
                                <p class="mb-2 text-lg font-semibold text-gray-800">
                                    {{ $product->category }}
                                </p>
                                <div class="sm:h-32">
                                    <h2 class="mb-8 text-gray-500">{{ $product->name }}</h2>
                                </div>
                                <div>
                                    <p class="text-xl mt-1">￥{{ number_format($product->price) }}<span class="text-xl text-gray-700">円(税込)</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- article - end -->
                    @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $products->appends([
                            'category' => \Request::get('category'),
                            'sort' => \Request::get('sort'),
                            'pagination' => \Request::get('pagination')
                        ])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

    const select = document.getElementById('sort')
    select.addEventListener('change', function(){
        this.form.submit();
    });

    const paginate = document.getElementById('pagination')
    paginate.addEventListener('change', function(){
        this.form.submit();
    });

</script>
</x-app-layout>
