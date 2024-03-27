<?php

namespace App\Models\Admin\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
         'title',
         'slug',
         'description',
         'thumbnail',
         'video',
         'category_id',
         'user_id',
         'status',
         'meta_title',
         'meta_description',
         'meta_keyword'
        ];

        public function user(){
            return $this->hasOne(User::class,'id','user_id');
        }
        public function features(){
            return $this->hasMany(ServiceFeature::class);
        }
        public function faqs(){
            return $this->hasMany(ServiceFaq::class);
        }

        public function package(){
            return $this->hasOne(ServicePackage::class);
        }
}
