<?php

namespace App\Http\Controllers\User;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Product;






class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::withTrashed();

        $histories = Purchase::join('product_purchase','purchases.id','=','product_purchase.purchase_id')
        ->joinSub($product, 'products', function ($join) {
            $join->on('product_purchase.product_id','=','products.id');
        })
        ->join('images','products.image1','=','images.id')
        ->select('purchases.created_at','products.id as id','name','filename','title','quantity','status','purchase_product_price','purchases.id as pid')
        ->where('purchases.user_id','=',Auth::id())
        ->orderBy('purchases.created_at','desc')
        ->paginate(10);

        return view('user.purchase.index',compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Purchase $purchase)
    {
        $purchase->where('id','=',$request->purchase_id)
        ->update([
            'status' => 1,
        ]);
        return Redirect::route('user.purchase.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function cancel(Request $request)
    {
        $histories = DB::table('purchases')
        ->join('product_purchase','purchases.id','=','product_purchase.purchase_id')
        ->join('products','product_purchase.product_id','=','products.id')
        ->join('images','products.image1','=','images.id')
        ->where('purchases.id','=',$request->purchase_id)
        ->select('purchases.created_at','products.id as id','name','filename','title','quantity','status','purchase_product_price','purchases.id as pid')
        ->orderBy('purchases.created_at','desc')
        ->paginate(10);

        return view('user.purchase.cansel',compact('histories'));
    }
}
