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
use App\Models\Purchase;
use Illuminate\Support\Facades\Redirect;
use PhpOption\Option;

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

    public function show($id,$option)
    {
        $product = Product::findOrFail($id);
        $count= 0;
        if($option !== " "){
            if(is_numeric($option)){
                $products = $product->where('capacity','=',$option)
                ->where('color','=',$product->color)
                ->where('secondary_category_id','=',$product->secondary_category_id)
                ->where('is_selling','=',$product->is_selling)
                ->orderBy('updated_at', 'desc')
                ->get();

                if(empty($products[0])){
                    return redirect()->route('user.items.show', ['item' => $id, 'option' => ' '])
                    ->with(['message' => '現在お取り扱いがありません。', 'status' => 'alert']);
                }
                $count= count($products);
                $product = $products[0];
            }else{
                $products = $product->where('capacity','=',$product->capacity)
                ->where('color','=',$option)
                ->where('secondary_category_id','=',$product->secondary_category_id)
                ->where('is_selling','=',$product->is_selling)
                ->orderBy('updated_at', 'desc')
                ->get();

                if(empty($products[0])){
                    return redirect()->route('user.items.show', ['item' => $id, 'option' => ' '])
                    ->with(['message' => '現在お取り扱いがありません。', 'status' => 'alert']);
                }
                $count= count($products);
                $product = $products[0];
            }
            $quantity = Stock::where('product_id', $product->id)
            ->sum('quantity');
        }else{
            $quantity = Stock::where('product_id', $product->id)
            ->sum('quantity');    
        }

        if($quantity > 9){
            $quantity = 9;
        }
        
        $category = $product->category->id;

        if($category===1){
            return view('user.show-iphone12', compact('product', 'quantity','count'));
        }elseif($category===2){
            return view('user.show-iphone13', compact('product', 'quantity','count'));
        }elseif($category===3){
            return view('user.show-iphone14', compact('product', 'quantity','count'));
        }elseif($category===5){
            return view('user.show-ipad-Air', compact('product', 'quantity','count'));
        }elseif($category===4){
            return view('user.show-ipad-min', compact('product', 'quantity','count'));
        }elseif($category===6){
            return view('user.show-ipad-Pro', compact('product', 'quantity','count'));
        }elseif($category===7){
            return view('user.show-mac-Air', compact('product', 'quantity','count'));
        }elseif($category===8){
            return view('user.show-mac-Pro', compact('product', 'quantity','count'));
        }else{
            return view('user.show', compact('product', 'quantity','count'));
        }
    }

    public function more($id,$color,$capacity)
    {
        $product = Product::findOrFail($id);
        $products = Product::availableItems()
        ->where('color','=',$color)
        ->where('capacity','=',$capacity)
        ->where('secondary_category_id','=',$product->secondary_category_id)
        ->orderBy('products.updated_at', 'desc')
        ->paginate(20);
        return view('user.more',compact('products'));
    }

}