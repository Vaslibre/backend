<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notas;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $result = User::whereNickname($slug)->first();

        if (!$result) {
            abort(404);
        }

        $notas = $result->notas()->paginate(4);

        return view('front.profile.index', compact('result','notas'));
    }

}
