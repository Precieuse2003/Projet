<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function ajouterAuxFavoris(Request $request)
{
    $produitId = $request->input('produit_id');
    $user = auth()->user();

    if (!$user->favoris()->where('produit_id', $produitId)->exists()) {
        $user->favoris()->create(['produit_id' => $produitId]);
    }

    return response()->json(['success' => true, 'message' => 'Produit ajouté aux favoris.']);
}

public function getFavoris()
{
    $favoris = auth()->user()->favoris()->with('produit')->get();
    return response()->json($favoris);
}

public function supprimerFavoris(Request $request)
{
    $produitId = $request->input('produit_id');
    auth()->user()->favoris()->where('produit_id', $produitId)->delete();

    return response()->json(['success' => true, 'message' => 'Produit supprimé des favoris.']);
}

public function nombreFavoris()
{
    return response()->json(['count' => auth()->user()->favoris()->count()]);
}

}
