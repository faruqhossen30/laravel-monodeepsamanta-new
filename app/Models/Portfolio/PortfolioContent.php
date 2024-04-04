<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_id',
        'content_type',
        'heading',
        'description',
        'photo',
        'video'
    ];
}
