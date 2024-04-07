<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WebsiteConfigRequest;
use App\Models\WebsiteConfig;
use Illuminate\Http\Request;

class WebsiteConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = WebsiteConfig::orderby('config_name')->paginate(10);
        return view('backend.configs.index', compact(
            'configs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.configs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteConfigRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $config = WebsiteConfig::create($data);
        return redirect()->route('admin.configs.index')->with('success', 'Thêm mới config thành công');

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
    public function edit(WebsiteConfig $config)
    {
        return view('backend.configs.edit', compact(
            'config'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteConfigRequest $request, WebsiteConfig $config)
    {
        // dd($request->all());
        $config->config_name = $request->config_name;
        $config->config_value = $request->config_value;
        $config->config_comment = $request->config_comment;
        $config->update();
        return redirect()->route('admin.configs.index')->with('success', 'Cập nhật config thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
