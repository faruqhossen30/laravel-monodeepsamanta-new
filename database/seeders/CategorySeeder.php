<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use App\Models\Review\ReviewType;
use App\Models\Category;
use Illuminate\Database\Seeder;


use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = array(
            array('name' => 'Apps', 'slug' => 'apps', 'author_id' => '1'),
            array('name' => 'Dashboard', 'slug' => 'dashboard', 'author_id' => '1'),
            array('name' => 'Landing Page', 'slug' => 'landing-page', 'author_id' => '1'),
            array('name' => 'Website', 'slug' => 'website', 'author_id' => '1')
        );

        $gallery_categories = array(
            array('name' => 'Service', 'slug' => 'service', 'author_id' => '1'),
            array('name' => 'Portfolio', 'slug' => 'portfolio', 'author_id' => '1'),
            array('name' => 'Review', 'slug' => 'review', 'author_id' => '1'),
            array('name' => 'Blog', 'slug' => 'blog', 'author_id' => '1')
        );

        $review_types = array(
            array('name' => 'Google Reviews', 'slug' => 'google-reviews', 'thumbnail' => NULL, 'user_id' => '1'),
            array('name' => 'Fiverr', 'slug' => 'fiverr', 'thumbnail' => NULL, 'user_id' => '1'),
            array('name' => '99Design', 'slug' => '99design', 'thumbnail' => NULL, 'user_id' => '1')
        );

        Category::insert($categories);
        GalleryCategory::insert($gallery_categories);
        ReviewType::insert($review_types);

    }
}
