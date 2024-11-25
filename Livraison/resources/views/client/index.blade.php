@extends('partials.nav_client')
@section('content')
  <!---MAIN-->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>

  <main>

    <!---BANNER-->

    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="./assets/images/img-04.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-text">
                Faites vos achats en toute sécurité dans le supermarché qui vous convient
              </p>

              <a href="#" class="banner-btn">DECOUVRIR</a>

            </div>

          </div>
          <div class="slider-item">

            <img src="./assets/images/img-03.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-text">
                Faites vos achats en toute sécurité dans le supermarché qui vous convient
              </p>

              <a href="#" class="banner-btn">DECOUVRIR</a>

            </div>

          </div>
          <div class="slider-item">

            <img src="./assets/images/img-02.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-text">
                Faites vos achats en toute sécurité dans le supermarché qui vous convient
              </p>

              <a href="#" class="banner-btn">DECOUVRIR</a>

            </div>

          </div>
          <div class="slider-item">

            <img src="./assets/images/image.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-text">
                Faites vos achats en toute sécurité dans le supermarché qui vous convient
              </p>

              <a href="#" class="banner-btn">DECOUVRIR</a>

            </div>

          </div>



        </div>

      </div>

    </div>

  </main>


@endsection



















{{--

            <!-- Drink Menu Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="cold">Produits Alimentaires</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="hot">Produits Laitiers</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="juice">Produits Surgelés</a>
                </li>
              </ul>
            </nav>

            <div id="cold" class="tm-tab-content">

              <div class="tm-list">
                @forelse($alimentaires as $alimentaire)
                <div class="tm-list-item">
                <img class="tm-list-item-img" src="{{ asset('storage/'.$alimentaire->image) }}" alt="{{ $alimentaire->nom }}">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{$alimentaire->nom}}<span class="tm-list-item-price">{{$alimentaire->prix}} Fcfa</span></h3>
                     <p class="tm-list-item-description">{{$alimentaire->description}}</p>
                    <div class="container mt-5 d-flex justify-content-center">
                     <a href="" class="btn btn-warning">Ajouter au panier</a>
                    </div>
                  </div>
                </div>
                @empty
                <h1 style="color: aqua;">Aucun produit n'est actuellement disponible dans cette catégorie.</h1>
                @endforelse
              </div>

            </div>
<!-- Produit laitier -->
            <div id="hot" class="tm-tab-content">

            <div class="tm-list">
                @forelse($laitiers as $laitier)
                <div class="tm-list-item">
                <img class="tm-list-item-img" src="{{ asset('storage/'.$laitier->image) }}" alt="{{ $laitier->nom }}">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{$laitier->nom}}<span class="tm-list-item-price">{{$laitier->prix}} Fcfa</span></h3>
                     <p class="tm-list-item-description">{{$laitier->description}}</p>
                    <div class="container mt-5 d-flex justify-content-center">
                     <a href="" class="btn btn-warning">Ajouter au panier</a>
                    </div>
                  </div>
                </div>
                @empty
                <h1 style="color: aqua;">Aucun produit n'est actuellement disponible dans cette catégorie.</h1>
                @endforelse
              </div>
            </div>
     <!-- produit surgelés -->
            <div id="juice" class="tm-tab-content">

            <div class="tm-list">
                @forelse($surgeles as $surgele)
                <div class="tm-list-item">
                <img class="tm-list-item-img" src="{{ asset('storage/'.$surgele->image) }}" alt="{{ $surgele->nom }}">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{$surgele->nom}}<span class="tm-list-item-price">{{$surgele->prix}} Fcfa</span></h3>
                     <p class="tm-list-item-description">{{$surgele->description}}</p>
                    <div class="container mt-5 d-flex justify-content-center">
                     <a href="" class="btn btn-warning">Ajouter au panier</a>
                    </div>
                  </div>
                </div>
                @empty
                <h1 style="color: aqua;">Aucun produit n'est actuellement disponible dans cette catégorie.</h1>
                @endforelse
              </div>
            </div>
            <!-- end Drink Menu Page -->
          </div>
</html> --}}
