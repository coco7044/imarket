<?php

namespace App\Constants;

class Common
{
const PRODUCT_ADD = '1';
const PRODUCT_REDUCE = '2';

const PRODUCT_LIST = [
    'add' => self::PRODUCT_ADD,
    'reduce' => self::PRODUCT_REDUCE
];

const ORDER_HIGHER = '1';
const ORDER_LOWER = '2';
const ORDER_LATER = '3';
const ORDER_OLDER = '4';

const SORT_ORDER = [
    'higherPrice' => self::ORDER_HIGHER,
    'lowerPrice' => self::ORDER_LOWER,
    'later' => self::ORDER_LATER,
    'older' => self::ORDER_OLDER
];

const NICOSUMA_URL = [
    'iphone12_64GB' => 'https://www.nicosuma.com/iphone?models=iphone-se%2Ciphone-12&storages=64gb&sort=price-desc',
    'iphone12_128GB' => 'https://www.nicosuma.com/iphone?models=iphone-se%2Ciphone-12&storages=128gb&sort=price-desc',
    'iphone12_256GB' => 'https://www.nicosuma.com/iphone?models=iphone-se%2Ciphone-12&storages=256gb&sort=price-desc',
];
const GEO_URL = [
    'iphone12_64GB' => 'https://ec.geo-online.co.jp/shop/goods/search.aspx?sort=spd&search.x=0&capacity=64GB&tree=10016501',
    'iphone12_128GB' => '',
    'iphone12_256GB' => '',
];
const BACKMARKET_URL = [
    'iphone12' => 'https://www.backmarket.co.jp/ja-jp/l/iphone-12/d592825d-a581-4b8b-af49-7b30356ef7f5',
];



}