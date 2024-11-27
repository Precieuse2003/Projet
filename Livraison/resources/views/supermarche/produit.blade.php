<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits de {{ $supermarche->nom }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .product-item img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Produits du Supermarché{{ $supermarche->nom}}</h1>
    <div class="products">
        @foreach($supermarche->produits as $produit)
            <div class="product-item">
                <h3>{{ $produit->nom }}</h3>
                <img src="{{ asset('assets/images/' . $produit->image) }}" alt="{{ $produit->nom }}">
                <p>Prix : {{ $produit->prix }} FCFA</p>
            </div>
        @endforeach
    </div>
</body>
</html>
