@extends('partials.navbar')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Modifier le rôle</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{route('role.update',['role'=>$role->id])}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                        <input type="text" name="name" value="{{$role->name}}" class="form-control">
                        @error('Nom')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
