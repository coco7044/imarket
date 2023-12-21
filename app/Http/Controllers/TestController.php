<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constants\GeoCommon;



class TestController extends Controller
{
    public function  test(){

        // GeoCommon::truncateTables();
        // GeoCommon::saveGeoURL('MacBook','MacBook_Air');
        // GeoCommon::saveGeoIphoneItems();
        // GeoCommon::saveGeoIpadItems();
        // GeoCommon::saveGeoMacBookItems();

        

        return view('admin.search.index');
        
    }
}
