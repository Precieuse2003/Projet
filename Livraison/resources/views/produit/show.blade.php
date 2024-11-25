@extends('partials.navbar')
@section('content')
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
                            <img src="{{ asset('storage/'.$produit->image) }}" class="form-control" alt="{{ $produit->nom }}" style="width: 150px; height: 150px;">
                           </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
