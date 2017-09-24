<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Banner::latest()->paginate();

        return view('admin.banner.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = new Banner();

        return view('admin.banner.partials.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'  => 'required',
            'url_site'   => 'required',
            'url_banner'   => 'required',
        ]);

        $banner = Banner::create([
            'titulo' => $request->titulo,
            'url_site' => $request->url_site,
            'url_banner' => $request->url_banner
        ]);

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha agregado el banner correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('banner.index');        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.partials.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'titulo'  => 'required',
            'url_site'   => 'required',
            'url_banner'   => 'required',
        ]);

        $input = $request->all();

        if ($request->has('titulo') && $banner->titulo != $request->titulo) {
            $banner->titulo = $request->titulo;
        }

        if ($request->has('url_site') && $banner->url_site != $request->url_site) {
            $banner->url_site = $request->url_site;
        }

        if ($request->has('url_banner') && $banner->url_banner != $request->url_banner) {
            $banner->url_banner = $request->url_banner;
        }

        if (!$banner->isDirty()) {
            notify()->flash('Oops', 'error',[
                'text' => 'Debe realizar por lo menos un cambio para poder actualizar',
                'timer'=> 4000
            ]);

            return back();
        }

        $banner->save();

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha actualizado el banner correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha eliminado el banner correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('banner.index');
        
    }
}
