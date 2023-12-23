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
use App\Models\Geo_url;
use Goutte\Client;


class GeoCommon
{
    // //BackMarketのiphone12系の商品データURLの取得とDBへの保存,Python起動
    public static function saveGeoURL($category,$model){

        $path = app_path() . '/Python/Geo/'.$category.'/'.$model.'.py';
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
        DB::table('geo_urls')->insert($values);
    }

    //iPhoneのスクレイピング
    public static function saveGeoIphoneItems()
    {
        set_time_limit(200);
        $datas = Geo_url::select('url')->get()->toArray();
        self::putCsv($datas);

        $path = app_path() . '/Python/Geo/iPhone/scraping.py';
        $command = 'python ' . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command);

        $scrapeDatas = [];
        $geoCsvDatas = self::getCsv();

        foreach($geoCsvDatas as $data){
            $scrapeDatas[] = [
                'title' => $data[0],
                'price' => $data[1],
                'color' => $data[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('geo_items')->insert($scrapeDatas);
    }

    //iPadのスクレイピング
    public static function saveGeoIpadItems()
    {
        set_time_limit(200);
        $datas = Geo_url::select('url')->get()->toArray();
        self::putCsv($datas);

        $path = app_path() . '/Python/Geo/iPad/scraping.py';
        $command = 'python ' . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command);

        $scrapeDatas = [];
        $geoCsvDatas = self::getCsv();

        foreach($geoCsvDatas as $data){
            $scrapeDatas[] = [
                'title' => $data[0],
                'price' => $data[1],
                'color' => $data[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('geo_items')->insert($scrapeDatas);
    }

    //MacBookのスクレイピング
    public static function saveGeoMacBookItems()
    {
        set_time_limit(200);
        $datas = Geo_url::select('url')->get()->toArray();
        self::putCsv($datas);

        $path = app_path() . '/Python/Geo/MacBook/scraping.py';
        $command = 'python ' . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command);

        $scrapeDatas = [];
        $geoCsvDatas = self::getCsv();

        foreach($geoCsvDatas as $data){
            $scrapeDatas[] = [
                'title' => $data[0],
                'price' => $data[1],
                'color' => '不明',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('geo_items')->insert($scrapeDatas);
    }

    //AppleWatchのスクレイピング
    public static function saveGeoAppleWatchItems()
    {
        set_time_limit(200);
        $datas = Geo_url::select('url')->get()->toArray();
        self::putCsv($datas);

        $path = app_path() . '/Python/Geo/AppleWatch/scraping.py';
        $command = 'python ' . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command);

        $scrapeDatas = [];
        $geoCsvDatas = self::getCsv();

        foreach($geoCsvDatas as $data){
            $scrapeDatas[] = [
                'title' => $data[0],
                'price' => $data[1],
                'color' => $data[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('geo_items')->insert($scrapeDatas);
    }
    


    //DBのトランケート
    public static function truncateTables()
    {
        DB::table('geo_urls')->truncate();
        DB::table('geo_items')->truncate();

    }

    //DBのデータをCSVファイルに保存する
    private static function putCsv($data) {
        try {
            //CSV形式で情報をファイルに出力のための準備
            $csvFileName = '../app/Python/Geo/url.csv';
            $res = fopen($csvFileName, 'w');
            if ($res === FALSE) {
                throw new Exception('ファイルの書き込みに失敗しました。');
            }
            // ループしながら出力
            foreach($data as $dataInfo) {
                // ファイルに書き出しをする
                fputcsv($res, $dataInfo);
            }
            // ファイルを閉じる
            fclose($res);
        } catch(Exception $e) {
            // 例外処理をここに書きます
            echo $e->getMessage();
        }
    }

    private static function getCsv(){
        try {
            //前準備
            $csvFileName = './geoResult.csv';
            $res = fopen($csvFileName, 'r');
            $geoCsvData = [];
            if ($res === FALSE) {
                throw new Exception('ファイルの読み込みに失敗しました。');
            }
            // ループしながら出力
            while(($data = fgetcsv($res))) {
                $geoCsvData[] = $data;
            }
            // ファイルを閉じる
            fclose($res);

            return $geoCsvData;
        } catch(Exception $e) {
            // 例外処理をここに書きます
            echo $e->getMessage();
        }
    }
    
}