<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
    <style>
        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @for ($i = 1; $i <= 9; $i++)
                <div class="col-md-4 image-container">
                    <img src="https://via.placeholder.com/300x200" alt="Image {{ $i }}">
                    <p>Texte pour l'image {{ $i }}</p>
                </div>
            @endfor
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
