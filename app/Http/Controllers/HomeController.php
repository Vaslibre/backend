<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notas;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Notas $nota)
    {
        $this->nota = $nota;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = null)
    {
        if ($request->has('id') && $request->has('go') || $request->has('go')) {

            $id = $request->input('id');
            $go = $request->input('go');

            if ($go == 5) {
                return $this->nota->oldToNewPost($id);
            }
            if ($go == 9) {
                return $this->nota->toAbout();
            }
            if ($go == 8) {
                return redirect()->action('PublicacionesController@index');
            }
            if ($go == 13) {
                return redirect()->route('colaboraciones');
            }

        }

        $result = Notas::latest()
        ->wherePublicado(true)
        ->filter(request(['month','year']))
        ->paginate(6);
        return view('front.welcome', compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notas  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return $this->nota->getNotas($slug);
    }

    public function colaboraciones()
    {
        return view('front.colaboraciones');
    }

    public function politicas()
    {
        return view('front.politicas');
    }
}