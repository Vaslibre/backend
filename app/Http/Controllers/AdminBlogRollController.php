<?php

namespace App\Http\Controllers;

use App\BlogRoll;
use Illuminate\Http\Request;

class AdminBlogRollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = BlogRoll::latest()->paginate();

        return view('admin.blogroll.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogroll = new BlogRoll();

        return view('admin.blogroll.partials.create', compact('blogroll'));
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
        ]);

        BlogRoll::create([
            'titulo' => $request->titulo,
            'url_site' => $request->url_site,
        ]);

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha agregado correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('blogroll.index');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogRoll  $blogRoll
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogRoll $blogroll)
    {
        return view('admin.blogroll.partials.edit', compact('blogroll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogRoll  $blogRoll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogRoll $blogroll)
    {
        $this->validate($request, [
            'titulo'  => 'required',
            'url_site'   => 'required',
        ]);

        $input = $request->all();

        if ($request->has('titulo') && $blogroll->titulo != $request->titulo) {
            $blogroll->titulo = $request->titulo;
        }

        if ($request->has('url_site') && $blogroll->url_site != $request->url_site) {
            $blogroll->url_site = $request->url_site;
        }

        if (!$blogroll->isDirty()) {
            notify()->flash('Oops', 'error',[
                'text' => 'Debe realizar por lo menos un cambio para poder actualizar',
                'timer'=> 4000
            ]);

            return back();
        }

        $blogroll->save();

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha actualizado el banner correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('blogroll.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogRoll  $blogRoll
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogRoll $blogroll)
    {
        $blogroll->delete();

        notify()->flash('Bien', 'success',[
            'text' => 'Se ha eliminado correctamente',
            'timer'=> 4000
        ]);

        return redirect()->route('blogroll.index');
    }
}
