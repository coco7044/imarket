<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use app\Console\Commands\PythonTestCommand;
use Artisan;



class PriceSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

    }

    public function create()
    {
        $categories = PrimaryCategory::with('secondary')
        ->get();
        return view('admin.search.create',compact('categories'));
    }

    private function checkBackItemCount(){
        $crawler = \Goutte::request('GET',\Constant::BACKMARKET_URL['iphone12']);
        $crawler->filter('h3')->each(function($node){
            dump($node->text());
        });
    }

    //BackMarketのiphone12系の商品データURLの取得とDBへの保存
    private function saveBackIphone12SaveUrls(){

        Artisan::call('python:test');
        $f = fopen(__DIR__.'/../../../../public/search/search.csv',"r");
        while ($line = fgetcsv($f)) {
            print_r($line);
        }
        fclose($f);


        // $path = app_path() . "/Python/test.py";
        // $command = "python " . $path;
        // exec($command,$output);
        // dd($output);


        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=64000%2064%20GB');
        // $crawler = new Crawler($response->getBody()->getContents());
        // sleep(5);
        // $urls = $crawler->filter('.productCard > a')->each(function($node){
        //     dump( [
        //         'url' => $node->attr('href'),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // });
        // DB::table('back_market_urls')->insert($urls);
    }

    //DBのトランケート
    private function truncateTables()
    {
        DB::table('back_market_urls')->truncate();
    }

    //検索ボタンによって実行される処理
    public function store(Request $request)
    {
        // $this->checkBackItemCount();
        // $this->truncateTables();
        $this->saveBackIphone12SaveUrls();
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
