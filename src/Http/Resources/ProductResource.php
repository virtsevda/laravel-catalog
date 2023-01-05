<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Virtsevda\LaravelCatalog\Http\Resources\BrandResource;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $brand = $this->brand->name ?? null;
        return [
            'id'=>$this->id,
            'brand'=>$brand ?? 'IronFox',
            'sku'=>$this->sku,
            'name'=>$this->name,
            'sku_slug'=>$this->sku_slug,

        ];
    }
}
