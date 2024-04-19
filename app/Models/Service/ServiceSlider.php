<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSlider extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'thumbnail','video','order_number'];
}
