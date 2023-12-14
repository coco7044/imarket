<x-app-layout>
    <x-slot name="header">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
        @if(\Request::get('buy') == 1)
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                発送先情報
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                会員情報
            </h2>
        @endif
    </x-slot>

        <div class="py-12">
            <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-400">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <x-flash-message status="profileInfo" />
                        @if(\Request::get('buy') == 1)
                            <h2 class="flex justify-center font-semibold text-xl text-gray-800 leading-tight">
                                発送先情報
                            </h2>
                        @else
                            <h2 class="flex justify-center font-semibold text-xl text-gray-800 leading-tight">
                                会員情報
                            </h2>
                        @endif
                            <form method="post" action="{{ route('user.profileInfo.update') }}" class="h-adr mt-6 space-y-6">
                            <span class="p-country-name" style="display:none;">Japan</span>                      
                                @csrf
                                @method('PATCH')                                
                                    <div class="container px-5 py-8 mx-auto">
                                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                            <div class="flex flex-wrap -m-2">
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                                        <input type="text" id="name" name="name" @if($user_info == null) value="" @else value="{{ $user_info->name }}" @endif class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="kana" class="leading-7 text-sm text-gray-600">フリガナ</label>
                                                        <input type="text" id="kana" name="kana" @if($user_info == null) value="" @else value="{{ $user_info->kana }}" @endif class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                                        <input type="text" id="tel" name="tel" @if($user_info == null) value="" @else value="{{ $user_info->tel }}" @endif class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
                                                        <input type="number" id="postcode" name="postcode" @if($user_info == null) value="" @else value="{{ $user_info->postcode }}" @endif class="p-postal-code w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                                                        <input type="text" id="address" name="address" @if($user_info == null) value="" @else value="{{ $user_info->address }}" @endif class="p-region p-locality p-street-address p-extended-address w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <label class="leading-7 text-sm text-gray-600">性別</label>
                                                        <input type="radio" id="gender0" name="gender" value="0" @if($user_info != null) @if( $user_info->gender === 0 ) checked @endif @else  @endif>
                                                        <label for="gender0" class="ml-2 mr-4">男性</label>
                                                        <input type="radio" id="gender1" name="gender" value="1" @if($user_info != null) @if( $user_info->gender === 1 ) checked @endif @else  @endif>
                                                        <label for="gender1" class="ml-2 mr-4">女性</label>
                                                        <input type="radio" id="gender2" name="gender" value="2" @if($user_info != null) @if( $user_info->gender === 2 ) checked @endif @else  @endif>
                                                        <label for="gender2" class="ml-2 mr-4">その他</label>
                                                    </div>
                                                </div>
                                                @if(\Request::get('buy') == 1)
                                                <div class="p-2 w-full">
                                                    <input type="hidden" id="buy" name="buy" value="1">
                                                    <button type="submit" class="flex mx-auto box text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">購入する</button>
                                                </div>
                                                @else
                                                <div class="p-2 w-full">
                                                    <input type="hidden" id="buy" name="buy" value="0">
                                                    <button type="submit" class="flex mx-auto box text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

