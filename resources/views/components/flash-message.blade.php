@props(['status' => 'info'])

@php
  if(session('status') === 'info'){$bgColor = 'bg-blue-300';}
  if(session('status') === 'profileInfo'){$bgColor = 'bg-blue-500';}
  if(session('status') === 'alert'){$bgColor = 'bg-red-500';}
@endphp

@if(session('message'))
  <div class="fadeIn {{ $bgColor }} w-1/2 flex justify-center mx-auto p-2 my-4 text-white">
    {{ session('message' )}}
  </div>
@endif
