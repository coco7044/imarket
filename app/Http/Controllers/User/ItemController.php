<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Jobs\SendThanksMail;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('item'); 
            if(!is_null($id)){ 
            $itemId = Product::availableItems()->where('products.id',$id)->exists();
                if(!$itemId){ 
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function top()
    {
        return view('user.top');
    }


    public function index(Request $request)
    {

        // 同期的に送信
        // Mail::to('test@example.com')
        // ->send(new TestMail());

        // 非同期に送信
        // SendThanksMail::dispatch();

        $categories = PrimaryCategory::with('secondary')->get();

        //topからcategoryにprimaryCategoryありでアクセスされたときの動作
        if( in_array($request->input('category'),['iPhone','iPad','MacBook','AppleWatch','AirPods & イヤホン']) ){
            $categoryName = $request->input('category');
            $products = Product::primaryAvailableItems($categoryName)
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->paginate($request->pagination ?? '20');
        }else{
            $products = Product::availableItems()
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->paginate($request->pagination ?? '20');
        }

        return view('user.index', compact('products','categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        if($quantity > 9){
            $quantity = 9;
        }
        $category = $product->category->id;

        if($category===1){
            return view('user.show-iphone12', compact('product', 'quantity'));
        }elseif($category===2){
            return view('user.show-iphone13', compact('product', 'quantity'));
        }elseif($category===3){
            return view('user.show-iphone14', compact('product', 'quantity'));
        }elseif($category===5){
            return view('user.show-ipad-Air', compact('product', 'quantity'));
        }elseif($category===4){
            return view('user.show-ipad-min', compact('product', 'quantity'));
        }elseif($category===6){
            return view('user.show-ipad-Pro', compact('product', 'quantity'));
        }elseif($category===7){
            return view('user.show-mac-Air', compact('product', 'quantity'));
        }elseif($category===8){
            return view('user.show-mac-Pro', compact('product', 'quantity'));
        }else{
            return view('user.show', compact('product', 'quantity'));
        }
    }
}