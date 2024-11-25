<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'numeric', 'digits_between:8,15'],
            'adresse' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone'=>$request->telephone,
            'adresse'=>$request->adresse,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'supermarche_id' => 1

        ]);

            // 'type'=>$request->type,
       event(new Registered($user)); // Ajout de l'événement pour la création de l'utilisateur

    return redirect('login')->with('success', 'Inscription réussie!');
    }
}
