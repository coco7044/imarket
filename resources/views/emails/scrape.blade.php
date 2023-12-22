<br>
<p class="mb-4">価格調査結果</p>

<div @if(!empty($backItems->toArray())) style="" @else style="display:none" @endif>
    <div class="mb-4">BackMarket</div>
    @foreach($backItems as $item)
    <ul class="mb-4">
        <li>商品名: {{ $item->title }}</li>
        <li>商品金額: {{ number_format($item->price) }}円</li>
        <li>カラー: {{ $item->color }}</li>
    </ul>
    @endforeach
</div>

<div @if(!empty($geoItems->toArray())) style="" @else style="display:none" @endif>
    <div class="mb-4">ゲオオンライン</div>
    @foreach($geoItems as $item)
        <ul class="mb-4">
            <li>商品名: {{ $item->title }}</li>
            <li>商品金額: {{ number_format($item->price) }}円</li>
            <li>カラー: {{ $item->color }}</li>
        </ul>
    @endforeach
</div>

