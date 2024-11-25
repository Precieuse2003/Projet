@extends('partials.nav_client')
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie d'images</title>
</head>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
<body>
    <div class="gallery">
        <div class="gallery-item">
            <h3>Erevan</h3>
            <a href="#">
                <img src="{{asset('assets/images/erevan_calavi.jpg')}}" alt="">
            </a>
            <p>Calavi</p>
        </div>
        <div class="gallery-item">
            <h3>Azima Store</h3>
            <a href="#">
                <img src="{{asset('assets/images/azima.jpg')}}" alt="">
            </a>
            <p>Calavi</p>
        </div>
        <div class="gallery-item">
            <h3>Champion</h3>
            <a href="#">
                <img src="{{asset('assets/images/champion.jpg')}}" alt="">
            </a>
            <p>Calavi</p>
        </div>
        <div class="gallery-item">
            <h3>BSS</h3>
            <a href="#">
                <img src="{{asset('assets/images/sup.jpg')}}" alt="">
            </a>
            <p>Cotonou</p>
        </div>
        <div class="gallery-item">
            <h3>Africagel</h3>
            <a href="#">
                <img src="{{asset('assets/images/africagel.jpg')}}" alt="">
            </a>
            <p>Cotonou</p>
        </div>
        <div class="gallery-item">
            <h3>Mont Sinaï</h3>
            <a href="#">
                <img src="{{asset('assets/images/montsinai.jpg')}}" alt="">
            </a>
            <p>Cotonou</p>
        </div>


    </div>
</body>
</html>


<style>

.gallery {
    display: flex;
    overflow-x: auto;
    gap: 10px;
    padding: 20px;
    box-sizing: border-box;
    width: 100%;
    max-width: 1200px;
    margin-bottom: 300px;
    margin-top: 50px;
}

.gallery-item {
    flex: 0 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: white;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    border-radius: 5px;
    max-width: 200px;
    margin: 0 10px;
    overflow: auto hidden;
}

.gallery-item h3 {
    margin: 0 0 10px;
    font-size: 1.2em;
    text-align: center;
    color: var(--eerie black);
}
.gallery-item h3:hover{
    color: var(--bittersweet);
    cursor: pointer;
}

.gallery-item a {
    text-decoration: none;
    color: inherit;
}

.gallery-item img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.gallery-item p {
    margin: 10px 0 0;
    font-size: 1.0em;
    font-weight: bold;
    text-align: center;
}

@media (max-width: 600px) {
    .gallery {
        flex-direction: column;
        align-items: center;
    }

    .gallery-item {
        max-width: 100%;
        margin: 10px 0;
    }
}

</style>


@endsection
