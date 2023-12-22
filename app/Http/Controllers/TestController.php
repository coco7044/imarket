<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\GeoCommon;
use App\Models\Back_market_items;
use App\Models\Geo_items;




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
        
    }
}
