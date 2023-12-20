<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryCategory;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Constants\BackMarketCommon;



class PriceSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        //
    }

    public function create()
    {
        $categories = PrimaryCategory::with('secondary')
        ->get();
        return view('admin.search.create',compact('categories'));
    }

    //検索ボタンによって実行される処理
    public function store(Request $request)
    {
        // dd($request);
        $sites = $request['site'];
        $category = $request['category'];
        $format = $request['format'];

        if( $category == "iPhone 12"){
            $size = $request['iPhone_12'];
            $type = 'iPhone';
        }elseif( $category == "MacBook Pro"){
            $size = $request['MacBook_Pro'];
            $type = 'MacBook';
        }elseif( $category == "MacBook Air"){
            $size = $request['MacBook_Air'];
            $type = 'MacBook';
        }elseif( $category == "iPad Pro"){
            $size = $request['iPad_Pro'];
            $type = 'iPad';
        }else{
            $type = mb_strstr( $category, ' ', true);
            $size = $request[$type];
        }
        $urlName = str_replace(' ','_',$category).'_'.$size;

        if(in_array($category, ['AirPods Pro','AirPods 3']) ){
            $urlName = str_replace(' ','_',$category);
        }



        foreach( $sites as $site ){
            if( $site === 'backMarket' ){
                BackMarketCommon::truncateTables();
                BackMarketCommon::saveBackMarketURL($type,$urlName);
                
                if( in_array($category, ['iPad mini','iPad Air','iPad Pro']) ){
                    BackMarketCommon::saveBackMarketIpadItems();
                }elseif( in_array($category, ['iPhone 12','iPhone 13','iPhone 14']) ){
                    BackMarketCommon::saveBackMarketIphoneItems();
                }elseif( in_array($category, ['MacBook Air','MacBook Pro']) ){
                    BackMarketCommon::saveBackMarketMacBookItems();
                }elseif( in_array($category, ['AppleWatch 7','AppleWatch 8']) ){
                    BackMarketCommon::saveBackMarketAppleWatchItems();
                }else{
                    BackMarketCommon::saveBackMarketAirPodsItems();
                }
            }else{

            }
    
        }
        return view('admin.search.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
