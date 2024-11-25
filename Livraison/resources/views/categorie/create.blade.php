@extends('partials.navbar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center mt-5">
                    <h3>Créer une catégorie</h3>
                </div>
                <div class="card-body">

                    {{-- Affichage des messages d'erreur --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Affichage des messages de succès --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('categorie.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="nom" placeholder="Nom" class="form-control">
                            @error('nom')
                                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
