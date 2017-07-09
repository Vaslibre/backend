<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;

class RssController extends Controller
{
    public function index()
    {
        $post = Notas::all()->reverse();

        return response()->view('front.partials.rss', [
            'posts' => $post,
        ])->header('Content-Type', 'application/rss+xml');
    }
}
