@php
if($type === 'products'){
  $path = 'storage/products/';
}
@endphp

<div class="bordercrear img_wrap flex justify-center">
  @if(empty($filename))
    <img src="{{ asset('images/no_image.jpg')}}">
  @else
    <img src="{{ asset($path . $filename)}}">
  @endif
</div>