<?php

namespace App\Models\Portfolio;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'slider',
        'user_id',
        'category_id',
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public  function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function sections()
    {
        return $this->hasMany(PortfolioSection::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'portfolio_categories');
    }
}
