<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = collect([

            // Admin
            ['name' => 'admin list',   'module_name' => 'admin'],
            ['name' => 'admin create', 'module_name' => 'admin'],
            ['name' => 'admin update', 'module_name' => 'admin'],
            ['name' => 'admin delete', 'module_name' => 'admin'],
            ['name' => 'admin show',   'module_name' => 'admin'],

            // Roll
            ['name' => 'role list',   'module_name' => 'role'],
            ['name' => 'role create', 'module_name' => 'role'],
            ['name' => 'role update', 'module_name' => 'role'],
            ['name' => 'role delete', 'module_name' => 'role'],
            ['name' => 'role show',   'module_name' => 'role'],

            // Review
            ['name' => 'review list',   'module_name' => 'review'],
            ['name' => 'review create', 'module_name' => 'review'],
            ['name' => 'review update', 'module_name' => 'review'],
            ['name' => 'review delete', 'module_name' => 'review'],
            ['name' => 'review show',   'module_name' => 'review'],
            // Review
            ['name' => 'review_type list',   'module_name' => 'review_type'],
            ['name' => 'review_type create', 'module_name' => 'review_type'],
            ['name' => 'review_type update', 'module_name' => 'review_type'],
            ['name' => 'review_type delete', 'module_name' => 'review_type'],
            ['name' => 'review_type show',   'module_name' => 'review_type'],
            // Service
            ['name' => 'service list',   'module_name' => 'service'],
            ['name' => 'service create', 'module_name' => 'service'],
            ['name' => 'service update', 'module_name' => 'service'],
            ['name' => 'service delete', 'module_name' => 'service'],
            ['name' => 'service show',   'module_name' => 'service'],
            //  Portfolio
            ['name' => 'protfolio list',   'module_name' => 'protfolio'],
            ['name' => 'protfolio create', 'module_name' => 'protfolio'],
            ['name' => 'protfolio update', 'module_name' => 'protfolio'],
            ['name' => 'protfolio delete', 'module_name' => 'protfolio'],
            ['name' => 'protfolio show',   'module_name' => 'protfolio'],
            //Gallery
            ['name' => 'gallery list',   'module_name' => 'gallery'],
            ['name' => 'gallery create', 'module_name' => 'gallery'],
            ['name' => 'gallery update', 'module_name' => 'gallery'],
            ['name' => 'gallery delete', 'module_name' => 'gallery'],
            ['name' => 'gallery show',   'module_name' => 'gallery'],
            //Gallery Category
            ['name' => 'gallery_category list',   'module_name' => 'gallery_category'],
            ['name' => 'gallery_category create', 'module_name' => 'gallery_category'],
            ['name' => 'gallery_category update', 'module_name' => 'gallery_category'],
            ['name' => 'gallery_category delete', 'module_name' => 'gallery_category'],
            ['name' => 'gallery_category show',   'module_name' => 'gallery_category'],

            // software
            ['name' => 'software list',   'module_name' => 'software'],
            ['name' => 'software create', 'module_name' => 'software'],
            ['name' => 'software update', 'module_name' => 'software'],
            ['name' => 'software delete', 'module_name' => 'software'],
            ['name' => 'software show',   'module_name' => 'software'],
            // permission
            ['name' => 'permission list',   'module_name' => 'permission'],
            ['name' => 'permission create', 'module_name' => 'permission'],
            ['name' => 'permission update', 'module_name' => 'permission'],
            ['name' => 'permission delete', 'module_name' => 'permission'],
            ['name' => 'permission show',   'module_name' => 'permission'],
            // user
            ['name' => 'user list',   'module_name' => 'user'],
            ['name' => 'user create', 'module_name' => 'user'],
            ['name' => 'user update', 'module_name' => 'user'],
            ['name' => 'user delete', 'module_name' => 'user'],
            ['name' => 'user show',   'module_name' => 'user'],
            // category
            ['name' => 'category list',   'module_name' => 'category'],
            ['name' => 'category create', 'module_name' => 'category'],
            ['name' => 'category update', 'module_name' => 'category'],
            ['name' => 'category delete', 'module_name' => 'category'],
            ['name' => 'category show',   'module_name' => 'category'],

            // Blog
            ['name' => 'blog list',   'module_name' => 'blog'],
            ['name' => 'blog create', 'module_name' => 'blog'],
            ['name' => 'blog update', 'module_name' => 'blog'],
            ['name' => 'blog delete', 'module_name' => 'blog'],
            ['name' => 'blog show',   'module_name' => 'blog'],
            // Setting

            ['name' => 'websitesetting',       'module_name' => 'setting'],
            ['name' => 'socialmedia setting',  'module_name' => 'setting'],
            ['name' => 'contactsetting',       'module_name' => 'setting'],
            // websitesetting

        ]);

        $web = collect([]);

        $permissions->map(function ($permission) use ($web) {
            $web->push([
                'name' => $permission['name'],
                'module_name' => $permission['module_name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        Permission::insert($web->toArray());
    }
}
