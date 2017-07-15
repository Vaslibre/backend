<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::latest()->paginate();
        return view('admin.user.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.user.new', compact('roles'));
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
            'name'      => 'bail|required|min:2',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
            'roles'     => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {

            $this->syncPermissions($request, $user);

            notify()->flash('Correcto', 'success', [
                'timer' => 3000,
                'text' => 'Se ha creado el usuario',
            ]);

        } else {

            notify()->flash('Error', 'success', [
                'timer' => 3000,
                'text' => 'No se pudo crear el usuario',
            ]);

        }

        return redirect()->route('users.index');
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

        $user           = User::find($id);
        $roles          = Role::pluck('name', 'id');
        $permissions    = Permission::all('name', 'id');

        return view('admin.user.edit', compact('user', 'roles', 'permissions'));

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
            'name'  => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        notify()->flash('Correcto', 'success', [
            'timer' => 3000,
            'text' => 'Se ha actualizado la información.',
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Auth::user()->id == $id )
        {

            notify()->flash('Error', 'success', [
                'timer' => 3000,
                'text' => 'Lo siento pero no te puedes eliminar a ti mismo',
            ]);

            return redirect()->back();
        }

        if( User::findOrFail($id)->delete() )
        {

            notify()->flash('Correcto', 'success', [
                'timer' => 3000,
                'text' => 'Se ha eliminado el usuario',
            ]);

        } else {

            notify()->flash('Error', 'success', [
                'timer' => 3000,
                'text' => 'Mira, no. Quizás alguna iguana mordió un cable o algo...',
            ]);

        }

        return redirect()->back();
    }

    /**
     * Sync roles and permissions
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles          = $request->get('roles', []);
        $permissions    = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        // reset all direct permissions for user
        // handle permissions
        (! $user->hasAllRoles( $roles )) ? $user->permissions()->sync([]) : $user->syncPermissions($permissions);

        $user->syncRoles($roles);

        return $user;

    }    
}
