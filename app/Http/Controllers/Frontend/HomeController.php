<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\BannerType;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\TopServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        {
            $welcomeBanners = Banner::query()
                ->where('type', BannerType::WELCOME)
                ->get();
            $opening_time = array();
            if (getWebsiteConfig('opening_time')) {
                $opening_date = strtotime(getWebsiteConfig('opening_time'));
                $opening_time['show'] = 1;
                if (strtotime("now") > $opening_date) {
                    $opening_time['show'] = 0;
                }
                $opening_time['year'] = date('Y', $opening_date);
                $opening_time['month'] = date('m', $opening_date);
                $opening_time['day'] = date('d', $opening_date);
                $opening_time['hour'] = date('H', $opening_date);
            }

            if ((int) getWebsiteConfig('layout_website') == 1) {
                return view('frontend.welcome.welcome1', compact(
                    'welcomeBanners',
                    'opening_time',
                ));
            }
            return view('frontend.welcome.welcome', compact(
                'welcomeBanners',
                'opening_time',
            ));
        }
    }

    public function genCode(){
        for ($i=0; $i < 20; $i++) { 
            $code = "GC5ML".mb_strtoupper(substr(md5(uniqid().time()),6,6));
            echo $code."<br/>";
        }
        exit;
    }

    public function home(){
        $hotPosts = Post::query()
            ->orderBy('published_at', 'desc')
            ->orderBy('title', 'asc')
            ->paginate(10)
            ;
        $hotBanners = Banner::query()
            ->where('type', BannerType::HOMEPAGE)
            ->get();
        ;
        return view('clients.home', compact(
            'hotPosts',
            'hotBanners',
        ));
    }

    public function master(){
        return view('clients.layouts.master');
    }

    public function font(){
        return view('frontend.font');
    }

    public function category(Category $category){
        $posts = $category->posts()
                ->orderBy('published_at', 'desc')
                ->with(['admin','category'])
                ->paginate(10)
                ;
        $title = $category->name;
        $description = $category->description;
        $image = $category->thumbnail;


        return view('clients.category_posts', compact(
            'posts',
            'category',
            'title',
            'description',
            'image',
        ));
    }

    public function singlePost(Request $request, Post $post){
        $title = $post->title;
        $description = $post->description;
        $image = $post->image;

        $category = $post->category;
        return view('clients.single_post', compact(
            'post',
            'category',
            'title',
            'description',
            'image',
        ));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $title = "Kết quả tìm kiếm cho: " . $search;
        $description = $title;

        $query = Post::query();
        $query->get();
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        }
        $posts = $query->orderBy('published_at', 'desc')
            ->orderBy('title', 'asc')
            ->paginate(10);
        $posts->appends(['search'=> $search]);
        return view('clients.search', compact(
            'posts',
            'search',
            'title',
            'description',
        ));
    }

    public function test(){
        var_dump(request()->ip());
    }
}
