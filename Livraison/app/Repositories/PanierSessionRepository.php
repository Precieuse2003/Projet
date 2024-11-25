<?php

namespace App\Repositories;

use App\Produit;

class PanierSessionRepository implements PanierInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("panier.show");
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (produit $produit, $quantite_produit) {
		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$produit_details = [
            'image'=> $produit->image,
            'nom' => $produit->nom,
			'prix' => $produit->prix,
			'quantite_produit' => $quantite_produit
		];

		$panier[$produit->id] = $produit_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (produit $produit) {
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$produit->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("panier"); // On supprime le panier en session
	}
}
?>
