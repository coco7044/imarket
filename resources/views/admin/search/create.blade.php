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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('admin.priceSearch.store')}}" >
                @csrf
                <div class="p-2 w-1/2 mx-auto">
                    <label for="site" class="leading-7 text-x text-gray-600">検索サイト</label>
                        <div class="flex pt-4 pb-8 justify-around">
                            <div>
                                <input id="backMarket" type="checkbox" name="site[]" value="backMarket" checked>
                                <label for="backMarket">BackMarket</label>
                            </div>
                            <div>
                            <input id="geo" type="checkbox" name="site[]" value="geo">
                                <label for="toggle2">ゲオオンライン</label>
                            </div>
                        </div>
                    </div>
                        <x-search-category :categories="$categories"/>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

function change() {

    const iphone12 = ['iPhone 12']
    const iphone = ['iPhone 13','iPhone 14']
    const MacBookAir = ['MacBook Air']
    const MacBookPro = ['MacBook Pro']
    const iPad = ['iPad mini','iPad Air']
    const iPadPro = ['iPad Pro']
    const AppleWatch = ['AppleWatch 7','AppleWatch 8']
    const AirPods = ['AirPods Pro','AirPods 3']


    if (document.getElementById("category")) {
        selboxValue = document.getElementById("category").value;
        if (iphone.includes(selboxValue)) {
            //iphoneを表示
            document.getElementById("iPhone").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("AirPods").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        } else if (iphone12.includes(selboxValue)) {
            //iphone12を表示
            document.getElementById("iPhone 12").style.display = "";
            //その他を非表示
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        } else if (MacBookPro.includes(selboxValue)) {
            //MacBookを表示
            document.getElementById("MacBook Pro").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none"
            document.getElementById("MacBook Air").style.display = "none";
        } else if (iPad.includes(selboxValue)) {
            //iPadを表示
            document.getElementById("iPad").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        } else if (AppleWatch.includes(selboxValue)) {
            //AppleWatchを表示
            document.getElementById("AppleWatch").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        } else if (iPadPro.includes(selboxValue)) {
            //iPad Proを表示
            document.getElementById("iPad Pro").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        }else if (MacBookAir.includes(selboxValue)) {
            //MacBook Airを表示
            document.getElementById("MacBook Air").style.display = "";
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
        } else if (AirPods.includes(selboxValue)) {
            //その他を非表示
            document.getElementById("iPhone 12").style.display = "none";
            document.getElementById("iPhone").style.display = "none";
            document.getElementById("MacBook Pro").style.display = "none";
            document.getElementById("iPad").style.display = "none";
            document.getElementById("AppleWatch").style.display = "none";
            document.getElementById("iPad Pro").style.display = "none";
            document.getElementById("MacBook Air").style.display = "none";
        }
    }
}

function buttonClick() {
    const hide0 = document.getElementById("hide0");
    const disp = document.getElementById("disp");
    const hide2 = document.getElementById("hide2");
    const email = document.getElementById("email");
    if (hide0.checked) {
        document.getElementById("email").style.display = "none";
    }
    if (disp.checked) {
        document.getElementById("email").style.display = "";
    }
    if (hide2.checked) {
        document.getElementById("email").style.display = "";
    }
}
</script>
</x-app-layout> 