<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Post::query();
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        }
        $posts = $query->paginate(15);
        $posts->appends(['search'=> $search]);
        return view('backend.posts.index', compact(
            'posts',
            'search',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('parent_id', 0)
                ->with('childrenCategories')
                ->get();
        $categories = arrangeCategories($cats);

        return view('backend.posts.create', compact(
            'categories',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['published_at'] = $request->published_at ?? date('Y-m-d');
        $data['hot_date'] = $request->published_at ?? date('Y-m-d', strtotime("+1 month") );
        $data['new_date'] = $request->published_at ?? date('Y-m-d', strtotime("+1 month"));
        $data['slug'] = $request->slug ?? Str::slug($request->name) . "-" . substr(md5(uniqid().time()),6,6);
        $data['user_id'] = auth()->guard('admin')->user()->id;
        // dd($data);
        $post = Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $cats = Category::where('parent_id', 0)
                ->with('childrenCategories')
                ->get();
        $categories = arrangeCategories($cats);
        return view('backend.posts.edit', compact(
            'post',
            'categories',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xoá bài viết thành công');
    }
}
