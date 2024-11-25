<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supermarche;

class SupermarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supermarches = Supermarche::all();
        return view('supermarche.index', compact('supermarches'));
    }
    /**
     * Montrer le formulaire pour créer une nouvelle ressource.
     */
    public function create()
    {
        return view('supermarche.create');
    }

    /**
     * Stocker une ressource nouvellement créée dans le stockage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_sup' => ['required','max:20'],
            'email_sup' => ['required','email','string','unique:supermarches,email_sup'],
            'adresse_sup' => ['required'],
            'image_sup' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gérer le téléchargement de l'image
        $imagePath = $request->file('image_sup')->store('images', 'public');

        // Créer le supermarché avec les données
        Supermarche::create([
            'nom_sup' => $request->nom_sup,
            'email_sup' => $request->email_sup,
            'adresse_sup' => $request->adresse_sup,
            'image_sup' => $imagePath,
        ]);

        return redirect()->route('supermarche.index')->with('succes', 'Supermarché ajouté avec succès');
    }


    /**
     * Afficher la ressource spécifiée.
     */
    public function show(string $id)
    {
        $supermarche = Supermarche::findOrFail($id);
        return view('supermarche.show', compact('supermarche'));
    }

    // Montrer le formulaire pour éditer un supermarché
    public function edit(Supermarche $supermarche)
    {
        return view('supermarche.edit', compact('supermarche'));
    }

    // Mettre à jour un supermarché existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_sup' => ['required'],
            'email_sup' => ['required', 'email', 'string', 'unique:supermarches,email_sup,'.$id],
            'adresse_sup' => ['required'],
            'image_sup' => ['image'],
        ]);

        $supermarche = Supermarche::findOrFail($id);

        // Si une nouvelle image est téléchargée, on la stocke
        if ($request->hasFile('image_sup')) {
            $imagePath = $request->file('image_sup')->store('images', 'public');
            $supermarche->image_sup = $imagePath;
        }

        // Mise à jour des autres champs
        $supermarche->update([
            'nom_sup' => $request->nom_sup,
            'email_sup' => $request->email_sup,
            'adresse_sup' => $request->adresse_sup,
            'image_sup' => $imagePath,
        ]);

        return redirect()->route('supermarche.index')->with('succes', 'Supermarché modifié avec succès');
    }


    // Supprimer un supermarché
    public function destroy(Supermarche $supermarche)
    {
        $supermarche->delete();
        return redirect()->route('supermarche.index')->with('succes', 'Supermarché supprimé avec succès');
    }
}
