<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'title',
    'body',
    'region_id',
    'image_url',
    'category_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}