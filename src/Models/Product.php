<?php

namespace Virtsevda\LaravelCatalog\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'sku',
        'sku_slug',
        'name'
    ];



    public function categories()
    {
        return $this->belongsToMany('Virtsevda\LaravelCatalog\Models\Category', 'categories_products', 'product_id','category_id');
    }


    public function brand()
    {
        return $this->belongsTo('Virtsevda\LaravelCatalog\Models\Brand', 'brand_id', 'id');
    }



}
