<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;

class SearchController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        return Notas::search($request->get('q'))->get();
    }
}
