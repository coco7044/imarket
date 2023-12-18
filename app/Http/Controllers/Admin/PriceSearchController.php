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
        BackMarketCommon::truncateTables();
        BackMarketCommon::saveBackMarketURL('iphone12_128'); //テストのためスクレイピング先を指定
        BackMarketCommon::saveBackMarketItems();
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
