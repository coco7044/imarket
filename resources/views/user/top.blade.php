<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TOP
            </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="lg:w-2/3 mx-auto">
                <div class="flex flex-wrap -mx-2">
                    <div class="px-2  w-1/2">
                    <a href="{{ route('user.items.index', ['primary_category' => 1 ,'category' => '' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                        <div class=" box rounded-lg bg-white flex flex-wrap w-full sm:py-24 py-16 sm:px-10 px-6 relative">
                                <img src="{{ asset('images/top-iphone.png')}}">
                                <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">iPhone</h2>
                                <p class="leading-relaxed">なめらかで耐久性の高いデザイン</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="px-2 w-1/2">
                    <a href="{{ route('user.items.index', ['primary_category' => 2 ,'category' => '' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                        <div class=" box rounded-lg bg-white flex flex-wrap w-full sm:py-24 py-16 sm:px-10 px-6 relative">
                        <img src="{{ asset('images/top-ipad.png')}}">
                            <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">iPad</h2>
                                <p class="leading-relaxed">楽しい性能を、みんなの手に</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 py-4 w-1/3">
                    <a href="{{ route('user.items.index', ['primary_category' => 3 ,'category' => '' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                        <div class="flex rounded-lg flex-wrap w-full box bg-white sm:py-24 py-16 sm:px-10 px-6 relative">
                        <img src="{{ asset('images/top-mac.png')}}">
                            <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">MacBook</h2>
                                <p class="leading-relaxed">A clear winner.</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="px-2 py-4 w-1/3">
                    <a href="{{ route('user.items.index', ['primary_category' => 4 ,'category' => '' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                        <div class="flex rounded-lg flex-wrap w-full box bg-white sm:py-24 py-16 sm:px-10 px-6 relative">
                        <img src="{{ asset('images/top-watch.png')}}">
                            <div class="text-center relative z-10 w-full">
                                <h2 class="text-xl text-gray-900 font-medium title-font mb-2">Apple Watch</h2>
                                <p class="leading-relaxed">新しい体験をリファービッシュ価格で</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="px-2 py-4 w-1/3">
                        <a href="{{ route('user.items.index', ['primary_category' => 5 ,'category' => '' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                            <div class="flex rounded-lg flex-wrap w-full box bg-white sm:py-24 py-16 sm:px-10 px-6 relative">
                            <img src="{{ asset('images/top-pods.png')}}">
                                <div class="text-center relative z-10 w-full">
                                    <h2 class="text-xl text-gray-900 font-medium title-font mb-2">AirPods & イヤホン</h2>
                                    <p class="leading-relaxed">今いる場所に、ベストな音を</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
