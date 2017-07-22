<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notas;
use App\Notifications\PostPublished;

use Illuminate\Support\Facades\Notification;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notas = new Notas;

        return view('partials.blog.create', compact('notas'));
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
            'intro'   => 'required',
            'texto'   => 'required',
        ]);
        
        $notas = new Notas;

        $notas->titulo      = $request->titulo;
        $notas->intro       = $request->intro;
        $notas->texto       = $request->texto;
        $notas->user_id     = Auth::id();
        $notas->publicado   = (Auth::user()->hasPermissionTo('add_publish')) ? 1 : 0;

        if ($notas->save()) {

            $notas->notify(new PostPublished());
            // Notification::send(new PostPublished());

            notify()->flash('Correcto', 'success',[
                'text' => 'La publicación fue creada correctamente.',
                'timer'=> 4000
            ]);

            return redirect()->route('home');

        } else {

            notify()->flash('Oops', 'error',[
                'text' => 'Hay un problema interno, intenta más tarde...',
                'timer'=> 4000
            ]);

            return back()->withInput();
        }        

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
    public function edit($id)
    {
        $notas = Notas::whereId($id)->first();

        return view('partials.blog.edit', compact('notas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $this->validate($request, [
            'titulo'  => 'required',
            'intro'   => 'required',
            'texto'   => 'required',
        ]);
        
        $notas = Notas::find($id);

        $notas->titulo      = $request->titulo;
        $notas->intro       = $request->intro;
        $notas->texto       = $request->texto;

        if ($notas->save()) {

            notify()->flash('Correcto', 'success',[
                'text' => 'La publicación fue actualizada correctamente.',
                'timer'=> 4000
            ]);

            return redirect()->route('home');

        } else {

            notify()->flash('Oops', 'error',[
                'text' => 'Hay un problema interno, intenta más tarde...',
                'timer'=> 4000
            ]);

            return back()->withInput();
        }    
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
