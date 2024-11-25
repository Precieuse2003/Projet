@extends('partials.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Créer un produit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control" id="image" required>
                            @error('image')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="nom" placeholder="Nom" class="form-control" id="nom" required>
                            @error('nom')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="description" placeholder="Description" class="form-control" required></textarea>
                            @error('description')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <select name="categorie_id" id="categorie" class="form-control" required>
                                @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" id="prix" name="prix" placeholder="Prix" class="form-control" required>
                            @error('prix')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="number" id="en_stock" name="en_stock" placeholder="En stock" class="form-control" required>
                            @error('En stock')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
