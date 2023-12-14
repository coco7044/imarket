<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryCategory;
use App\Models\PrimaryCategory;
use App\Models\Image;
use App\Models\Stock;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'is_selling',
        'sort_order',
        'secondary_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
        ->withPivot('quantity');
    }

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    public function imageFirst()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
    }

    public function imageSecond()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
    }

    public function imageThird()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
    }

    public function imageFourth()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot(['id', 'quantity']);
    }

    //ストックの取得関数
    private function getStocks()
    {
        return 
        DB::table('t_stocks')
        ->select('product_id', DB::raw('sum(quantity) as quantity'))
        ->groupBy('product_id')
        ->having('quantity', '>', 1);
    }

    public function scopePrimaryAvailableItems($query,$categoryName)
    {
        $stocks = $this->getStocks();
        $primaryId = PrimaryCategory::where('name', '=', $categoryName)->first()->id;
        $items = SecondaryCategory::where('primary_category_id',$primaryId);

        return 
        $query->joinSub($stocks, 'stock', function($join){
            $join->on('products.id', '=', 'stock.product_id');
        })
        ->joinSub($items, 'items', function($join){
            $join->on('products.secondary_category_id', '=', 'items.id');
        })
        ->join('images as image1', 'products.image1', '=', 'image1.id')
        ->where('products.is_selling', true)
        ->select('products.id as id', 'products.name as name', 'products.price'
        ,'products.sort_order as sort_order'
        ,'items.name as category'
        ,'image1.filename as filename');
    }

    public function scopeAvailableItems($query)
    {
        $stocks = $this->getStocks();
        return 
        $query->joinSub($stocks, 'stock', function($join){
            $join->on('products.id', '=', 'stock.product_id');
        })
        ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
        ->join('images as image1', 'products.image1', '=', 'image1.id')
        ->where('products.is_selling', true)
        ->select('products.id as id', 'products.name as name', 'products.price'
        ,'products.sort_order as sort_order'
        ,'secondary_categories.name as category'
        ,'image1.filename as filename');
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        if($sortOrder === null){
            return $query->orderBy('sort_order', 'asc') ;
            }
            if($sortOrder === \Constant::SORT_ORDER['higherPrice']){
                return $query->orderBy('price', 'desc') ;
            }
            if($sortOrder === \Constant::SORT_ORDER['lowerPrice']){
            return $query->orderBy('price', 'asc') ;
            }
            if($sortOrder === \Constant::SORT_ORDER['later']){
            return $query->orderBy('products.created_at', 'desc') ;
            }
            if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('products.created_at', 'asc') ;
            }

    }

    public function scopeSelectCategory($query, $categoryId)
    {
        if($categoryId !== '0')
        {
            return $query->where('secondary_category_id', $categoryId);
        } else {
            return ;
        }
    }

    public function scopeSearchKeyword($query, $keyword)
    {
        if(!is_null($keyword))
        {
           //全角スペースを半角に
            $spaceConvert = mb_convert_kana($keyword,'s');

            //空白で区切る
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($keywords as $word)
            {
                $query->where('products.name','like','%'.$word.'%');
            }

            return $query;  

        } else {
            return;
        }
    }



}
