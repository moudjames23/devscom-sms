<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->check('view_all_users');


        $title = "Utilisateur";

        if(Auth::user()->role->id == 1)
            $users = User::get();
        else
            $users = User::where('role_id', '!=', 1)->get();




        return view('backend.users.index', compact(['title', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check('create_users');

        $user = new User();

        $title = "Nouvel Utilisateur";
        $roles = Role::pluck('nom', 'id');

        return view('backend.users.create', compact(['user', 'title', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->check('create_users');
        $user = new User();
        $this->inputValidation($request, $user);

        $user->email = $request['email'];
        $user->nom = $request['nom'];
        $user->prenom = $request['prenom'];
        $user->password = bcrypt($request['password']);
        $user->role_id = $request['role'];

        $user->save();


        return redirect(route('user.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->check('show_users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Mise à jour';
        $roles = Role::pluck('nom', 'id');
        return view('backend.users.edit', compact(['user', 'title', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->inputValidation($request, $user);

        $user->email = $request['email'];
        $user->nom = $request['nom'];
        $user->prenom = $request['prenom'];

        if(!empty($request['password']))
            $user->password = bcrypt($request['password']);

        $user->role_id = $request['role'];
        $user->save();


        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function password()
    {
        $title = 'Modification mot de passe';

        $user = Auth::user();;

        return view('backend.users.password', compact(['title', 'user']));
    }

    public function passwordUpdate(Request $request)
    {

        $this->validate($request, [
            'password' => 'required||min:5|confirmed',
        ]);

        $user = User::findOrFail($request['user_id']);
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect(route('dashboard'));
    }

    public function disable($id)
    {
        //$this->check('disable_formation');
        $user = User::findOrFail($id);

        $user->status = !$user->status;
        $user->save();

        if ($user->status)
            Flashy::success($user->nom . ' activé avec succès');
        else
            Flashy::error($user->nom . ' désactivé avec succès');

        return redirect(route('user.index'));

    }


    public function inputValidation(Request $request, User $user)
    {
        if($request->getMethod() == 'POST')
        {
            return $this->validate($request, [
                'nom' => 'required|min:2',
                'prenom' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|confirmed',
                'role' => 'required',
            ]);
        }
        else
        {
            return $this->validate($request, [
                'nom' => 'required|min:2',
                'prenom' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' .$user->id,
                'password' => 'nullable||min:5|confirmed',
                'role' => 'required',
            ]);
        }
    }

    public function check($permission)
    {
        if(!Auth::user()->hasPermission($permission))
            abort(401);
    }
}
