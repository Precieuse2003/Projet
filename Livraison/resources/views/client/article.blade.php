@extends('partials.nav_client')
@section('content')
    <main>

            <div class="product-container">

                <div class="container">

                    <div class="product-box">

                        <!--
                        - PRODUCT GRID
                        -->

                        <div class="product-main">
                            <div class="product-grid">
                                @foreach ($categories as $categorie)
                                    <div class="cat">
                                        <h3>{{ $categorie->nom }}</h3>
                                        <div class="showcase">
                                            @if(isset($productsByCategory[$categorie->id]) && count($productsByCategory[$categorie->id]) > 0)
                                                @foreach($productsByCategory[$categorie->id] as $produit)
                                                    <div class="showcase-banner">
                                                        <img src="{{ asset('storage/'.$produit->image) }}" alt="{{ $produit->nom }}" width="300">

                                                        <div class="showcase-actions">
                                                            <a class="btn-action btn-heart">
                                                                <ion-icon name="heart-outline"></ion-icon>
                                                            </a>

                                                            <a href="{{route('panier.show', $produit->id)}}" class="btn-action btn-view">
                                                                <ion-icon name="eye-outline"></ion-icon>
                                                            </a>

                                                            <a href="{{route('panier.create', $produit->id)}}" class="btn-action btn-add">
                                                                <ion-icon name="bag-add-outline"></ion-icon>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="showcase-content">
                                                        <a href="#" class="showcase-category">{{ $produit->nom }}</a>

                                                        <h3>
                                                            <a href="#" class="showcase-title">{{ $produit->nom }}</a>
                                                        </h3>

                                                        <div class="price-box">
                                                            <p class="price">{{ $produit->prix }} Fcfa</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Aucun produit disponible dans cette catégorie.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main>
@endsection
