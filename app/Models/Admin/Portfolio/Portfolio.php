<?php

namespace App\Models\Admin\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'thumbnail',
        'slider',
        'user_id',
        'meta_tag',
        'meta_description',
        'keyword',
        'status'
    ];

    public function video()
    {
        return $this->hasOne(PortfolioVideo::class, 'portfolio_id');
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
