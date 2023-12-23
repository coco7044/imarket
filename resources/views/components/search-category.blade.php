                <form method="post" action="{{ route('admin.priceSearch.store')}}" >
                    @csrf
                    <div class= "md:p-2 md:w-1/2 md:mx-auto">
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
                    <div class="md:p-2 md:w-1/2 md:mx-auto">
                        <div class="pb-4 relative">
                            <label for="category" class="leading-7 text-x text-gray-600">カテゴリー</label>
                            <div class="pt-4">
                                <select onchange="change()" name="category" id="category" class=" w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                    @foreach($category->secondary as $secondary)
                                        <option value="{{ $secondary->name}}" >
                                            {{ $secondary->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="iPhone 12">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="iPhone 12" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="iPhone 12" value="64" class="mr-2" checked>64GB</div>
                                <div><input type="radio" name="iPhone 12" value="128" class="mr-2" >128GB</div>
                                <div><input type="radio" name="iPhone 12" value="256" class="mr-2" >256GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="iPhone"style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="iPhone" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="iPhone" value="128" class="mr-2" checked>128GB</div>
                                <div><input type="radio" name="iPhone" value="256" class="mr-2" >256GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="MacBook Pro" style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="MacBook Pro" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="MacBook Pro" value="128" class="mr-2" checked>128GB</div>
                                <div><input type="radio" name="MacBook Pro" value="256" class="mr-2" >256GB</div>
                                <div><input type="radio" name="MacBook Pro" value="1000" class="mr-2" >1000GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="MacBook Air" style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="MacBook Air" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="MacBook Air" value="128" class="mr-2" checked>128GB</div>
                                <div><input type="radio" name="MacBook Air" value="256" class="mr-2" >256GB</div>
                                <div><input type="radio" name="MacBook Air" value="512" class="mr-2" >512GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="iPad" style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="iPad" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="iPad" value="64" class="mr-2" checked>64GB</div>
                                <div><input type="radio" name="iPad" value="128" class="mr-2" >128GB</div>
                                <div><input type="radio" name="iPad" value="256" class="mr-2" >256GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="iPad Pro" style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="iPad Pro" class="leading-7 text-x text-gray-600">容量</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="iPad Pro" value="128" class="mr-2" checked>128GB</div>
                                <div><input type="radio" name="iPad Pro" value="256" class="mr-2" >256GB</div>
                                <div><input type="radio" name="iPad Pro" value="512" class="mr-2" >512GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="fadeIn" id="AppleWatch" style="display:none">
                        <div class="md:p-2 md:w-1/2 md:pb-8 md:mx-auto">
                            <label for="AppleWatch" class="leading-7 text-x text-gray-600">ケースサイズ</label>
                            <div class="relative pt-4 flex justify-around">
                                <div><input type="radio" name="AppleWatch" value="41" class="mr-2" checked>41</div>
                                <div><input type="radio" name="AppleWatch" value="45" class="mr-2" >45</div>
                            </div>
                        </div>
                    </div>

                    <div class="md:p-2 md:w-1/2 pb-8 md:mx-auto">
                    <label for="format" class="leading-7 text-x text-gray-600">出力形式</label>
                        <div  class="relative pt-4 flex justify-around">
                            <div><input id="hide0" onchange="buttonClick()" type="radio" name="format" value="0" class="mr-2" checked>画面表示</div>
                            <div><input id="disp" onchange="buttonClick()" type="radio" name="format" value="1" class="mr-2" >メール送信</div>
                            <div><input id="hide2" onchange="buttonClick()" type="radio" name="format" value="2" class="mr-2" >両方</div>
                        </div>
                    </div>
                    <div id="email" class="fadeIn flex justify-center relative" style="display:none">
                        <input type="email" name="email" placeholder="メールアドレスを入力" class="w-full md:w-1/2 rounded-lg border-gray-200"/>
                    </div>
                    <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('admin.dashboard')}}'" class="box bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-300 rounded text-lg">戻る</button>
                        <button type="submit" id="button" class="box text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>                        
                    </div>
                </form>
