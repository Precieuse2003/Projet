@extends('partials.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Modifier un produit</h3>
                </div>
                <div class="card-body">
                  <form action="{{route('produit.update', ['produit'=>$produit->id])}} " method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                     <input type="file" name="image" class="form-control" id="image">
                     @error('image')
                     <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                     @enderror
                    </div>
                    <div class="mb-3">
                     <input type="text" name="nom" value="{{$produit->nom}}" class="form-control" id="nom">
                     @error('nom')
                     <p>{{$message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                     <textarea name="description" class="form-control" id="description">{{$produit->description}}</textarea>
                     @error('description')
                     <p>{{$message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                     <select name="categorie_id" id="categorie" class="form-control">
                         @foreach ($categories as $categorie)
                         <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                         @endforeach
                     </select>
                     @error('categorie')
                     <p>{{$message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <input type="number" name="prix" value="{{$produit->prix}}" class="form-control" id="prix">
                        @error('prix')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="number" name="en_stock" value="{{$produit->en_stock}}" class="form-control" id="en_stock">
                        @error('En stock')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                     <select name="supermarche_id" id="supermarche" class="form-control">
                         @foreach ($supermarhes as $supermarche)
                         <option value="{{$supermarche->id}}">{{$supermarche->nom}}</option>
                         @endforeach
                     </select>
                     @error('supermarche')
                     <p>{{$message}}</p>
                     @enderror
                    </div>
                    <div class="text-center">
                       <button type="submit" class="btn btn-primary px-4">Modifier</button>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
