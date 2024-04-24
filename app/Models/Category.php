<?php

namespace App\Models;

use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','thumbnail','author_id','status'];

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class,'portfolio_categories');
    }

}
