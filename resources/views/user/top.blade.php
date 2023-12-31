<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TOP
            </h2>
    </x-slot>

    <section class="fadeIn text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
                    <div class="h-1/3 w-full lg:px-60">
                        <div class="fadeIn pb-4">
                            <a href="{{ route('user.items.index', ['category' =>'iPhone' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                                <div class=" box rounded-lg bg-white flex justify-center flex-wrap w-full sm:py-24 py-16 sm:px-10 px-6 relative">
                                    <div class="bordercrear img_wrap flex justify-center">
                                        <img src="{{ asset('images/top-iphone.png')}}">
                                    </div>
                                    <div class="text-center relative z-10 w-full">
                                        <h2 class="text-xl text-gray-900 font-medium title-font mb-2">iPhone</h2>
                                        <p class="invisible lg:visible leading-relaxed">なめらかで耐久性の高いデザイン</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="w-full flex justify-around lg:px-60">
                        <div class="fadeIn w-1/2 pb-2 pr-1">
                            <a href="{{ route('user.items.index', ['category' => 'iPad' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                                <div class=" box rounded-lg flex flex-wrap justify-center bg-white">
                                    <div class="bordercrear img_wrap flex justify-center">
                                        <img src="{{ asset('images/top-ipad.png')}}">
                                    </div>
                                    <div class="text-center relative z-10 w-full h-20">
                                        <h2 class="text-xl text-gray-900 font-medium title-font mb-2">iPad</h2>
                                        <p class="invisible lg:visible leading-relaxed">楽しい性能を、みんなの手に</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="fadeIn w-1/2 pb-2 pl-1">
                            <a href="{{ route('user.items.index', ['category' => 'MacBook' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                                <div class="box rounded-lg flex flex-wrap justify-center bg-white">
                                    <div class="bordercrear img_wrap flex justify-center">
                                        <img src="{{ asset('images/top-mac.png')}}">
                                    </div>
                                    <div class="text-center relative z-10 w-full h-20">
                                        <h2 class="text-xl text-gray-900 font-medium title-font mb-2">MacBook</h2>
                                        <p class="invisible lg:visible leading-relaxed">A clear winner.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="w-full flex justify-around lg:px-60">
                        <div class="fadeIn w-1/2 pb-2 pr-1">
                            <a href="{{ route('user.items.index', ['category' => 'AppleWatch' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                                <div class="box rounded-lg flex flex-wrap justify-center bg-white">
                                    <div class="bordercrear img_wrap flex justify-center">
                                        <img src="{{ asset('images/top-watch.png')}}">
                                    </div>
                                    <div class="text-center relative z-10 w-full h-20">
                                        <h2 class="text-xl text-gray-900 font-medium title-font mb-2">Apple Watch</h2>
                                        <p class="invisible lg:visible leading-relaxed">新しい体験をリファービッシュ価格で</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="fadeIn w-1/2 pb-2 pl-1">
                            <a href="{{ route('user.items.index', ['category' => 'AirPods & イヤホン' ,'sort' => \Constant::SORT_ORDER['later']])}}">
                                <div class="box rounded-lg flex flex-wrap justify-center bg-white">
                                    <div class="bordercrear img_wrap flex justify-center">
                                        <img src="{{ asset('images/top-pods.png')}}">
                                    </div>
                                    <div class="text-center relative z-10 w-full h-20">
                                        <h2 class="text-xl text-gray-900 font-medium title-font mb-2">AirPods</h2>
                                        <p class="invisible lg:visible leading-relaxed">今いる場所に、ベストな音を</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

            </div>
        </div>
    </section>
</x-app-layout>
