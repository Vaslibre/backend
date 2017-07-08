<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;

class SitemapController extends Controller
{
    public function index()
    {
        $post = Notas::all()->reverse();

        return response()->view('front.partials.sitemap', [
            'posts' => $post,
        ])->header('Content-Type', 'text/xml');
    }
}
