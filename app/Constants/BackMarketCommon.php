<?php

namespace App\Constants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use app\Console\Commands\BackMarketCommand;
use App\Models\BackMarket_url;
use Goutte\Client;


class BackMarketCommon
{
    // //BackMarketのiphone12系の商品データURLの取得とDBへの保存,Python起動
    public static function saveBackMarketURL($model){

        $path = app_path() . '/Python/BackMarket/'.$model.'.py';
        $command = "python " . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command,$outputs);
        
        $values = [];
        foreach($outputs as $output){
            $values[] = [   
                            'url'=> $output,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
        }
        DB::table('back_market_urls')->insert($values);
    }

        //DBから各ページのデータをGoutteで取得しDBに保存
    public static function saveBackMarketItems(){
        $scrapeDatas = [];
        foreach(BackMarket_url::all() as $itemURL){
            $url =  $itemURL ->url;
            $crawler = \Goutte::Request('GET',$url);
            $title = $crawler->filter('.flex-grow.hidden.items-center.justify-between.mb-5 > h1')->text();
            $price = $crawler->filter('.max-h-6.overflow-hidden > div')->text();
            $grade = $crawler->filter('.border-primary.bg-secondary > div')->text();

            $priceStr = str_replace(['￥',','],'',$price);
            $priceInt = (int)$priceStr;
            $gradeStr = mb_substr($grade,0,5);


            $start = mb_strpos($title,'-')+2;
            $end = mb_strpos($title,'-',$start+1)-1;
            $color = mb_substr($title, $start, $end-$start, 'UTF8');

            $scrapeDatas[] = [
                'title' => $title,
                'price' => $priceInt,
                'color' => $color,
                'grade' => $gradeStr,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('back_market_items')->insert($scrapeDatas);
    }

        //DBのトランケート
        public static function truncateTables()
        {
            DB::table('back_market_urls')->truncate();
            DB::table('back_market_items')->truncate();
    
        }
}