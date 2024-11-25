<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livreurs = Livreur::all();
        return view('livreur.index',compact('livreurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("livreur.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:livreurs,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            ]);
            Livreur::create($request->all());
            return redirect()->route('livreur.index')->with('succes','Livreur créer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Livreur::findOrFail($id);
    return view('livreur.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('livreur.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:livreurs,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            ]);
            // dd($request->all());
            $livreur->update($request->all());  
          return redirect()->route('livreur.index')->with('succes','Livreur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livreur->delete();
        return redirect()->route('livreur.index')->with('succes','Livreur supprimé avec succès');
    }
}
