<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                <h3>Détail du produit</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                         <p class="form-control">Nom: {{$produit->nom}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">Description: {{$produit->description}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">Categorie: {{$produit->categorie->nom}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">Prix: {{$produit->prix}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">En stock: {{$produit->en_stock}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">En stock: {{$produit->supermarche->nom_sup}}</p>
                        </div>
                        <div class="mb-3">
                            @if($produit->image)
                            <img src="{{ asset('storage/'.$produit->image) }}" class="form-control" alt="{{ $produit->nom }}" style="width: 150px; height: 150px;">
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<style>
    
</style>
