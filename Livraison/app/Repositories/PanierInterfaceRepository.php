<?php

namespace App\Repositories;

use App\Produit;

interface PanierInterfaceRepository {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(Produit $produit, $quantite_produit);

	// Retirer un produit du panier
	public function remove(Produit $produit);

	// Vider le panier
	public function empty();

}

?>
