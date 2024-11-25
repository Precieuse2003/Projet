<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Database\Eloquent\Builder;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('user.index',compact('users'));
    }
    public function index_admin()
    {
        $users = User::where('role_id', 1)->get();
        return view('user.index_admin', compact('users'));
    }

    public function index_client()
    {
        $users = User::where('role_id', 2)->get();
        return view('user.index_client', compact('users'));
    }

    public function index_livreur()
    {
        $users = User::where('role_id', 3)->get();
        return view('user.index_livreur', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
        'nom'=> ['required'],
        'role_id' => ['required', 'exists:roles,id'],
        'email'=> ['required'],
        'telephone'=> ['required'],
        'adresse'=> ['required'],
        'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'nom' => $request->nom,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse'=> $request->adresse,
            'password' => Hash::make($request->password),
            'supermarche_id'=>1,
        ]);
        return redirect()->route('user.index')->with('succes','Utilisateur créer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id )
    {
    $user = User::findOrFail($id);
    return view('user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user )
    {
        $request->validate([
            'nom'=> ['required'],
            'role_id' => ['required', 'exists:roles,id'],
            'email'=> ['required'],
            'telephone'=> ['required'],
            'adresse'=> ['required'],
           'password' => ['required', 'string', 'min:8'],
            ]);

            $user->update([
            'nom' => $request->nom,
            'role_id' =>$request->role_id,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse'=> $request->adresse,
            'password' => Hash::make($request->password),
            'supermarche_id'=>1,
            ]);
          return redirect()->route('user.index')->with('succes','Utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('user.index')->with('succes','utilisateur supprimé avec succès');
    }
}
