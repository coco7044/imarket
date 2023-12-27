<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\GeoCommon;
use App\Models\Back_market_items;
use App\Models\Geo_items;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;

use Illuminate\Support\Facades\Redirect;




class TestController extends Controller
{
    public function  test(){

        // GeoCommon::truncateTables();
        // GeoCommon::saveGeoURL('MacBook','MacBook_Air');
        // GeoCommon::saveGeoIphoneItems();
        // GeoCommon::saveGeoIpadItems();
        // GeoCommon::saveGeoMacBookItems();

        // $backItems = Back_market_items::all();
        // $geoItems = Geo_items::all();

        // return view('admin.search.index',compact('backItems','geoItems'));

        // $set_purchase_id = Purchase::select('id')->get();
        // dd($set_purchase_id->id);



        // $product = Product::orderByRaw("RAND()")->first();
        // $set_product_id = $product->id;
        // $set_product_price = $product->price;
        // $set_purchase_id = Purchase::select('id')->orderByRaw("RAND()")->first()->id;

        // dd($set_product_id,$set_product_price,$set_purchase_id);




        // return redirect('/');


        // $tUser = User::withTrashed()->get();
        // $User = User::all();

        // dd($tUser, $User);
        
        // return view('admin.test.index');
        
    }
}
