<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
           'name'=>['required'],
        ]);
        Role::create([
            'name'=>$request->name,
        ]);

      return redirect()->route('role.index')->with('succes','Rôle ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);

       return view('role.show', compact('role'));
    }

    public function edit($id)
{
    $role = Role::find($id);
    return view('role.edit', compact('role'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $role = Role::find($id);
    $role->name = $request->name;
    $role->save();

    return redirect()->route('role.index')->with('success', 'Rôle mis à jour avec succès');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        $role->delete();
        return redirect()->route('role.index')->with('succes','role supprimé avec succès');
    }
}
