<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $cats = Category::query()
            ->where('parent_id', 0)
            ->with('childrenCategories')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        $categories = arrangeCategories($cats);
        return view('backend.categories.index', compact(
            'categories',
        ));
    }

    // lỗi, tìm cách search và phân trang sau
    public function search(Request $request)
    {
        $search = $request->get('search');
        $query = Category::query()
            ->where('parent_id', 0)
            ->with('childrenCategories');
        // if ($search) {
        //     $query->where('name', 'like', "%{$search}%")
        //         ->orWhere('description', 'like', "%{$search}%")
        //         ->orWhere('slug', 'like', "%{$search}%");
        // }
        $cats = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10);
        $categories = arrangeCategories($cats);
        // dd($categories);
        // $categories->appends(['search'=> $search]);
        return view('backend.categories.index', compact(
            'categories',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::where('parent_id', 0)
                ->with('childrenCategories')
                ->get();
        $categories = arrangeCategories($cats);
        // $categories = parseMultiCategories($cats);

        // dd($newCat);
        return view('backend.categories.create', compact(
            'categories',
        ));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['show_in_menu'] = $request->show_in_menu ?? 0;
        $data['show_in_home'] = $request->show_in_home ?? 0;
        $data['slug'] = $request->slug ?? Str::slug($request->name) . "-" . substr(md5(uniqid().time()),6,6);
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['parent_id'] = $request->parent_id ?? 0;
        $category = Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm mới danh mục tin tức thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);
        $cats = Category::where('parent_id', 0)
                ->with('childrenCategories')
                ->get();
        $categories = arrangeCategories($cats);
        return view('backend.categories.edit', compact(
            'category',
            'categories',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $data['show_in_menu'] = $request->show_in_menu ?? 0;
        $data['show_in_home'] = $request->show_in_home ?? 0;
        $data['slug'] = Str::slug($request->name);
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['parent_id'] = $request->parent_id ?? 0;
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xoá danh mục tin tức thành công');
    }

    public function sortOrder(Request $request){
        $sortOrderList = json_decode($request->sort_order);
        foreach ($sortOrderList as $key => $value) {
            Category::where('id', $key)->update(['sort_order' =>  $value]);
        }
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật order thành công');
    }
}
