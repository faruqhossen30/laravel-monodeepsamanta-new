<?php

namespace App\Models\Review;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'date',
        'thumbnail',
        'review',
        'category_id',
        'review_type_id',
        'review_url',
        'user_id',
        'status'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];
    public function type()
    {
        return $this->hasOne(ReviewType::class,'id', 'review_type_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
}
