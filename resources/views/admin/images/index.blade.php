<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像管理
      </h2>
  </x-slot>

  <div class="fadeIn py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-flash-message status="session('status')" /> 
                <div class="flex justify-end mb-4"> 
                  <button onclick="location.href='{{ route('admin.images.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">画像の新規登録</button>                        
                </div> 

                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                    @foreach($images as $image )
                    <!-- article - start -->
                    <div class="box flex flex-col overflow-hidden rounded-lg border bg-white">
                    <a href="{{ route('admin.images.edit', ['image' => $image->id ])}}">  
                        <div class="box border rounded-md p-2 md:p-4">
                          <span class="flex justify-center">
                            <x-thumbnail :filename="$image->filename" type="products" />
                          </span>
                          <div class="text-gray-700">{{ $image->title }}</div>
                        </div>
                      </a>
                    </div>
                    <!-- article - end -->
                    @endforeach
                </div>

                {{ $images->links() }}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
