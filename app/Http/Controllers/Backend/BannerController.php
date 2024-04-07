<?php

namespace App\Http\Controllers\Backend;

use App\Enums\BannerType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Banner::query();
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ;
        }
        $banners = $query->paginate(15);
        $banners->appends(['search'=> $search]);
        return view('backend.banners.index', compact(
            'banners',
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
        $bannerTypes = BannerType::asSelectArray();
        return view('backend.banners.create', compact(
            'bannerTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
        $banner = Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Tạo banner thành công');
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
    public function edit(Banner $banner)
    {
        $bannerTypes = BannerType::asSelectArray();
        return view('backend.banners.edit', compact(
            'banner',
            'bannerTypes',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->all();
        $banner->update($data);
        return redirect()->route('admin.banners.index')->with('success', 'cập nhật banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Xoá banner thành công');
    }
}
