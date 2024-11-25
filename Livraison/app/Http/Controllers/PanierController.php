<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Produit;
use App\Repositories\PanierInterfaceRepository;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
{
    $items = Cart::getContent();
    return view('panier.index', ['Cartitems' => $items]);
}

// public function create(Request $request)
//  {
//     // Affiche un formulaire d'ajout au panier
//     $produitId = $request -> input('produit_id');
//     $quantite_produit = $request -> input('quantite_produit', 1);

//   $panier = session()->get('panier', []);
//   $produit = Produit::find($produitId);

//   if (!$produit){
//       return response()->json(['message'=> 'Produit non trouvé'], 404);
//   }
//   if (isset($panier[$produitId])){
//     $panier[$produitId]['quantite'] += $quantite;
//     $panier[$produitId]['total'] = $panier[$produitId]['quantite'] * $produit->prix;
//   } else{

//     $panier[$produitId] = [
//          'nom' => $produit -> nom,
//          'prix' => $produit -> prix,
//          'quantite_produit' => $produit -> quantite_produit,
//          'tatal' => $produit-> prix * $quantite
//     ];
//   }
//   session()->put('panier', $panier);

//   return response()->json(['message' => 'Produit ajoute au panier', 'panier => $panier',]);

// }

public function create($id)
{
    $produit = Produit::get($id);
    return view ('panier.create', compact('produit'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        // Valider la présence de quantités pour chaque produit spécifique
        'quantite_produit_*' => 'required|integer|min:1', // Validation pour chaque champ quantite_produit_X
    ]);

    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'quantite_produit_') === 0) {
            // Extraire l'ID du produit depuis le nom de la clé
            $produitId = str_replace('quantite_produit_', '', $key);

            // Vérifier si la quantité est supérieure à 0
            if ($value > 0) {
                // Récupérer le produit
                $produit = Produit::findOrFail($produitId);

                // Vérifier si le produit existe déjà dans le panier
                $existingItem = Cart::get($produit->id);

                if ($existingItem) {
                    // Si le produit existe déjà, augmenter la quantité
                    Cart::update($produit->id, [
                        'quantite_produit' => $existingItem->quantity + $value,
                    ]);
                } else {
                    // Sinon, ajouter le produit au panier
                    Cart::add([
                        'id' => $produit->id,
                        'nom' => $produit->nom,
                        'prix' => $produit->prix,
                        'quantite_produit' => $value, // Utiliser la quantité spécifiée
                    ]);
                }
            }
        }
    }

    return redirect()->route('panier.index')->with('success','Produit ajouté au panier');
}

public function edit($id)
{
    $item = Cart::get($id);

    if (!$item){
        return redirect()->route('panier.index')->with('erreur', 'Produit introuvable dans le panier');
    }

    return view('panier.edit', ['item' => $item]);
}

public function show($id)
{
    // Récupérer l'élément du panier par son ID
    $item = Cart::get($id);
    if(!$item){
        return redirect()->route('panier.index')->with('erreur', 'Produit introuvable dans le panier');
    }

    return view('panier.show', ['item' => $item]);
}


public function update(Request $request, $id)
{
    Cart::update($id, [
        'quantite_produit' => [
        'relative' => false,
        'value' => $request->quantite
        ]
    ]);

    return redirect()->route('panier.index')->with('success', 'Quantite mise à jour');
}

public function destroy($id)
{
    Cart::remove($id);
    return redirect()->route('panier.index')->with('success', 'Produit retiré du panier');
}

}
