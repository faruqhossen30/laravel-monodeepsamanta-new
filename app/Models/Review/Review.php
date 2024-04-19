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
        'email',
        'review',
        'rating',
        'review_communication',
        'review_recommend',
        'review_described',
        'date',
        'thumbnail',
        'review_type_id',
        'category_id',
        'service_id',
        'review_url',
        'website',
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
