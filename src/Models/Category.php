<?php

namespace Virtsevda\LaravelCatalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory,NodeTrait;

    protected $fillable = [
        'name', 'slug', 'parent_id','sku'
    ];

    public function children()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function products($request=null)
    {
        return $this->belongsToMany('Virtsevda\LaravelCatalog\Models\Product', 'categories_products', 'category_id', 'product_id')->orderBy('sku');
    }
}
