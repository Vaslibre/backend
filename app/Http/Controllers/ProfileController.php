<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notas;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Notas  $slug
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

}
