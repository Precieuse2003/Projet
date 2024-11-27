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
</div>

</body>
</html>


<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Trois colonnes */
            gap: 20px; /* Espacement entre les éléments */
            padding: 20px;
        }

        .gallery-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .gallery-item:hover {
            transform: scale(1.05); /* Agrandir légèrement au survol */
        }

        .gallery-item img {
            width: 100%; /* Adapter l'image à la largeur du conteneur */
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .gallery-item h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .gallery-item p {
            margin: 0 0 10px;
            font-size: 14px;
            color: #777;
        }

        @media (max-width: 768px) {
    .gallery {
        grid-template-columns: repeat(2, 1fr); /* Deux colonnes pour les écrans moyens */
    }
}

@media (max-width: 480px) {
    .gallery {
        grid-template-columns: 1fr; /* Une seule colonne pour les petits écrans */
    }
}      

</style>
 

@endsection
