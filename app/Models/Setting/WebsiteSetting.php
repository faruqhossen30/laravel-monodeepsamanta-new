<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'working_time',
        'working_day',
        'aboutme',
        'address',
        'email',
        'telephone_no',
        'mobile_no',
        'facebook_page_link',
        'facebook_group_link',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'youtube_link',
        'intro_video_link',
        'behance_link',
        'dribbble_link',
        'flickr_link',
        'monogram_link',
        'logo',
        'info',
    ];
}
