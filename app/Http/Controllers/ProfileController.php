<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $result = User::whereNickname($slug)->first();

        if (!$result) {
            abort(404);
        }

        $notas = $result->notas()->paginate(4);

        return view('front.profile.index', compact('result','notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $result = User::whereNickname($slug)->first();

        return view('front.profile.update', compact('result'));
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
            'inputNick'  => 'required|min:4',
            'inputName'  => 'required|min:4',
        ]);

        $user = User::find($id);

        $user->name     = $request->inputName;
        $user->nickname = $request->inputNick;
        $user->bio      = isset($request->inputBio) ? $request->inputBio : NULL ;

        if ($user->save()) {

            notify()->flash('Correcto', 'success',[
                'text' => 'Tus datos se actualizarón correctamente',
                'timer'=> 4000
            ]);

            return redirect()->route('home');

        } else {

            notify()->flash('Oops', 'error',[
                'text' => 'No se pudo actualizar, intente más tarde...',
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
