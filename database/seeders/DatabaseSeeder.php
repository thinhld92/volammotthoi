<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\WebsiteConfig;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $createMultipleAdmins = [
            [
                'name' => 'Lê Đức Thịnh',
                'username' => 'promickey',
                'email' => 'thinhld92@gmail.com',
                'password' => bcrypt('Admin@123'),
            ],
            [
                'name' => 'Ngô Đình Phúc',
                'username' => 'phucnd',
                'email' => 'phucnd@gmail.com',
                'password' => bcrypt('Admin@123'),
            ],
        ];

        Admin::insert($createMultipleAdmins);

        // insert some setting
        $dataWebsiteConfig = [
            [
                'config_name' => 'fanpage_url',
                'config_value' => 'https://www.facebook.com/volammotthoijx1',
            ],
            [
                'config_name' => 'phone_donate',
                'config_value' => '0396 396 935',
            ],
            [
                'config_name' => 'site_title',
                'config_value' => 'Võ Lâm Một Thời',
            ],
            [
                'config_name' => 'download_link',
                'config_value' => '/posts/tai-game',
            ],
            [
                'config_name' => 'bank_transfer_info',
                'config_value' => '',
            ],
            [
                'config_name' => 'opening_time',
                'config_value' => '',
            ],
        ];

        WebsiteConfig::insert($dataWebsiteConfig);

        $createMultipleCategories = [
            [
                'name' => 'Tin tức',
                'slug' => 'tin-tuc',
                'description' => 'Tin tức',
                'parent_id' => 0,
                'show_to_user' => 1,
                'show_in_menu' => 1,
            ],
            [
                'name' => 'Sự kiện',
                'slug' => 'su-kien',
                'description' => 'Tin tức sự kiện game',
                'parent_id' => 0,
                'show_to_user' => 1,
                'show_in_menu' => 1,
            ],
            [
                'name' => 'Cẩm nang',
                'slug' => 'cam-nang',
                'description' => 'Cẩm nang',
                'parent_id' => 0,
                'show_to_user' => 1,
                'show_in_menu' => 1,
            ],
            [
                'name' => 'Hướng dẫn',
                'slug' => 'huong-dan',
                'description' => 'Hướng dẫn cơ bản game',
                'parent_id' => 0,
                'show_to_user' => 1,
                'show_in_menu' => 1,
            ],
            [
                'name' => 'Môn phái',
                'slug' => 'mon-phai',
                'description' => 'Bài viết môn phái',
                'parent_id' => 0,
                'show_to_user' => 1,
                'show_in_menu' => 1,
            ]
            
        ];

        
        Category::insert($createMultipleCategories);

        $posts = 
            [
                'title' => "Tải và cài đặt trò chơi",
                'slug' => 'tai-game',
                'description' => "Dưới đây là thứ tự ưu tiên các cách để tải và cài đặt trò chơi Võ Lâm Truyền Kỳ về máy tính. Rất nhanh, rất đơn giản để sớm hòa mình vào thế giới giang hồ.",
                'content' => "Dưới đây là thứ tự ưu tiên các cách để tải và cài đặt trò chơi Võ Lâm Truyền Kỳ về máy tính. Rất nhanh, rất đơn giản để sớm hòa mình vào thế giới giang hồ.",
                'thumbnail' => 'https://placehold.co/600x400?text=DownLoad+Game',
                'image' => "https://placehold.co/600x400?text=DownLoad+Game",
                'image_caption' => "Tải và cài đặt trò chơi",
                'hot_date' => date('Y-m-d', strtotime('+2 week')),
                'new_date' => date('Y-m-d', strtotime('+2 week')),
                'category_id' => 4,
            ];

        // Post::factory(200)->create();
        Post::insert($posts);
    }
}
