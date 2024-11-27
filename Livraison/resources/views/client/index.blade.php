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
 
<!-- <div class="gallery">
    @if(isset($supermarches) && $supermarches->isNotEmpty())
    <ul>
        @foreach($supermarches as $supermarche)
            <div class="gallery-item">
                <h3>{{ $supermarche->nom_sup }}</h3>
                <a href="{{ route('client.article', $supermarche->id) }}">
                    <img src="{{ asset('assets/images/' . $supermarche->image_sup) }}" >
                </a>
                <p>{{ $supermarche->adresse_sup }}</p>
            </div>
        @endforeach
    </ul>
    @else
        <p>Aucun supermarché trouvé.</p>
    @endif
</div> -->