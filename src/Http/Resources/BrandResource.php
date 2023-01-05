<?php

namespace Virtsevda\LaravelCatalog\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'parent_id'=>$this->parent()->name,
            'slug'=>$this->slug,
            'created_at'=>$this->created_at
        ];
    }
}
