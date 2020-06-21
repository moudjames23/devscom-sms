<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Auth;
use App\Permission;

class RoleController extends Controller
{

    public function __constuct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check('view_all_role');
        $title = 'Liste des roles';

        $roles = Role::get();


        return view('backend.roles.index', compact(['title', 'roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check('create_role');
        $title = 'Nouveau role';

        $permissions = Permission::orderBy("type", "asc")->get();
        $role = new Role();

        return view('backend.roles.create', compact(['title', 'role', 'permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->check('create_role');
        $role = new Role();
        $this->inputsValidation($request, $role);
       
        $role->nom = $request['nom'];
        $role->save();

        $permissions = $request['permissions'];

        $role->permissions()->attach($permissions);

        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->check('show_role');

       $title = 'Informations du role ' .$role->nom;

       $users = $role->users;
       $permissions = $role->permissions;

       return view('backend.roles.show', compact(['title', 'role', 'users', 'permissions']));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->check('edit_role');
        $title = 'Mise à jour';

        $permissions = Permission::orderBy("type", "asc")->get();
    
        return view('backend.roles.edit', compact(['title', 'role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->check('edit_role');
        $this->inputsValidation($request, $role);
       
        $role->nom = $request['nom'];
        $role->save();

        $permissions = $request['permissions'];

        $role->permissions()->detach();

        $role->permissions()->attach($permissions);

        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->check('delete_role');
    }

    public function inputsValidation(Request $request, Role $role)
    {
        if($request->getMethod() == 'POST')
            return $this->validate($request, [
                'nom' => 'required|min:2|unique:roles'
            ]);

        return $this->validate($request, [
                'nom' => 'required|min:2|unique:roles,nom,' .$role->id
        ]);

    }

    public function check($permission)
    {
        if(!Auth::user()->hasPermission($permission))
            abort(401);
    }
}
