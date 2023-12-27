<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class AdminPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $purchases = Purchase::join('product_purchase','purchases.id','=','product_purchase.purchase_id')
        ->join('users','purchases.user_id','=','users.id')
        ->join('user_profile_infos','users.id','=','user_profile_infos.user_id')
        ->groupBy('purchases.id','user_profile_infos.kana','purchases.status','purchases.created_at','user_profile_infos.tel')
        ->select('purchases.id','user_profile_infos.kana','purchases.status','purchases.created_at','user_profile_infos.tel')
        ->selectRaw('sum(product_purchase.purchase_product_price) as total')
        ->orderBy('purchases.created_at','desc');

        $purchases = $purchases->where('user_profile_infos.kana','like','%'.$request->keyword.'%')
        ->orWhere('purchases.id','like','%'.$request->keyword.'%')
        ->orWhere('user_profile_infos.tel','like','%'.$request->keyword.'%')->paginate(50);

        // dd($purchases);

        return view('admin.purchase.index',compact('purchases'));
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
    public function show(Request $request)
    {

        $purchase_id = $request->purchase;

        $purchases = DB::table('purchases')
        ->join('product_purchase','purchases.id','=','product_purchase.purchase_id')
        ->join('products','product_purchase.product_id','=','products.id')
        ->join('images','products.image1','=','images.id')
        ->select('purchases.created_at','products.id as id','name','filename','title','quantity','purchase_product_price')
        ->where('purchases.id','=',$purchase_id)
        ->orderBy('purchases.created_at','desc')
        ->paginate(10);

        $userData = DB::table('purchases')
        ->join('user_profile_infos','purchases.user_id','=','user_profile_infos.user_id')
        ->where('purchases.id','=',$purchase_id)
        ->paginate(10);

        // dd($purchases,$userData);
        return view('admin.purchase.show',compact('purchases','userData','purchase_id'));
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
        return Redirect::route('admin.purchase.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminPurchase $adminPurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminPurchase $adminPurchase)
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

        return view('admin.purchase.cansel',compact('histories'));
    }
}
