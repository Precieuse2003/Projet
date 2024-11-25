<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <div class="card-header text-center">
                            <h3>Modifier l'utilisateur</h3>
                        </div>
                     <div class="card-body">
                        <form action="{{route('user.update', $user->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                             <input type="text" name="nom" value="{{$user->nom}}" class="form-control" >
                                @error('nom')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select name="role_id" id="role" class="form-control">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                @error('email')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="number" name="telephone" value="{{$user->telephone}}" class="form-control">
                                @error('telephone')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="adresse" value="{{$user->adresse}}" class="form-control">
                                @error('adresse')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" value="{{$user->password}}" class="form-control">
                                @error('Mot de passe')
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
    </div>
@endsection
