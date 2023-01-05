<?php

namespace Virtsevda\LaravelCatalog\Models;

use App\Traits\CommentTable;
use App\Traits\FileTable;
use App\Traits\ImageTable;

use App\Traits\RecordsHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','slug','parent_id','created_at','updated_at'];
}
