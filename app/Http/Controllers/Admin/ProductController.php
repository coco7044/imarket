<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Stock;
use App\Models\PrimaryCategory;
use App\Models\Admin;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //N個のSQLが発行されるのを防ぐ処理
        $products = Product::with('imageFirst')->orderBy('created_at','desc')->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::select('id', 'title', 'filename')
        ->orderBy('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('admin.products.create', 
            compact('images', 'categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try{
            DB::transaction(function () use($request) {
                $product = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'sort_order' => $request->sort_order,
                    'secondary_category_id' => $request->category,
                    'color' => $request->color,
                    'capacity' => $request->capacity,
                    'image1' => $request->image1,
                    'image2' => $request->image2,
                    'image3' => $request->image3,
                    'image4' => $request->image4,
                    'is_selling' => $request->is_selling
                ]);

                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' => $request->quantity
                ]);
            }, 2);
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('admin.products.index')
        ->with(['message' => '商品登録しました。',
        'status' => 'info']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        $images = Image::select('id', 'title', 'filename')
        ->orderBy('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('admin.products.edit',
            compact('product', 'quantity', 
            'images', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        //hidden属性にたいしてバリデーションを行う
        $request->validate([
            'current_quantity' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        if($request->current_quantity !== $quantity){
            $id = $request->route()->parameter('product');
            return redirect()->route('admin.products.edit', [ 'product' => $id])
            ->with(['message' => '在庫数が変更されています。再度確認してください。', 'status' => 'alert']);            

        } else {

            try{
                DB::transaction(function () use($request, $product) {
                    
                        $product->name = $request->name;
                        $product->price = $request->price;
                        $product->sort_order = $request->sort_order;
                        $product->secondary_category_id = $request->category;
                        $product->color = $request->color;
                        $product->capacity = $request->capacity;
                        $product->image1 = $request->image1;
                        $product->image2 = $request->image2;
                        $product->image3 = $request->image3;
                        $product->image4 = $request->image4;
                        $product->is_selling = $request->is_selling;
                        $product->save();

                    if($request->type === \Constant::PRODUCT_LIST['add']){
                        $newQuantity = $request->quantity;
                    }
                    if($request->type === \Constant::PRODUCT_LIST['reduce']){
                        $newQuantity = $request->quantity * -1;
                    }
                    Stock::create([
                        'product_id' => $product->id,
                        'type' => $request->type,
                        'quantity' => $newQuantity
                    ]);
                }, 2);
            }catch(Throwable $e){
                Log::error($e);
                throw $e;
            }
    
            return redirect()
            ->route('admin.products.index')
            ->with(['message' => '商品情報を更新しました。', 'status' => 'info']);
        }
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete(); 

        return redirect()
        ->route('admin.products.index')
        ->with(['message' => '商品を削除しました。',
        'status' => 'alert']);
    }
}
