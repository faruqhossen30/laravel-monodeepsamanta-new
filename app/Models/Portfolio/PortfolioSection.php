<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_id',
        'thumbnail',
        'iframe',
        'content',
    ];

}
