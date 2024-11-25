<h1>Ajouter un produit au panier</h1>

<form action="{{ route('panier.store') }}" method="POST">
    @csrf
    <div>
        @foreach($produits as $produit)
            <div>
                <p>{{$produit->nom}}</p>
            </div>
            <div>
                <p>{{$produit->prix}}</p>
            </div>
            <div>
                <label for="quantite_produit_{{$produit->id}}">Quantité</label>
                <input type="number" id="quantite_produit_{{$produit->id}}" name="quantite_produit_{{$produit->id}}"
                       value="0" min="0" required>
            </div>
        @endforeach
    </div>
    <button type="submit">Ajouter au panier</button>
</form>

