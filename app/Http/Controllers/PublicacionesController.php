<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicaciones;

class PublicacionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Publicaciones $publicaciones)
    {
        $this->publicaciones = $publicaciones;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->publicaciones->getAll();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return $this->publicaciones->getPublicacion($slug);
    }
}
