<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_id',
        'video_id',
        'pull_zone',
        'resolution',
    ];

}
