<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;

class RssController extends Controller
{
    public function index()
    {
        $post = Notas::orderBy('id', 'desc')
            ->paginate(100);

        return response()->view('front.partials.rss', [
            'posts' => $post,
        ])->header('Content-Type', 'application/rss+xml');
    }
}
