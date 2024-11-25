<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        return view('admin.index');
=======
        $admins = User::all()->where('is_admin', '0');
        return view('pages/admin/index',  compact('admins'));
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.cerate');
=======
        return view('pages/admin/create');
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        //
=======
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sexe' => ['required', 'string', 'max:10'],
            'profession' => ['required', 'string', 'max:50'],
        ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->sexe = $request->sexe;
            $user->profession = $request->profession;
            $user->is_admin = 1;
            $user->save();


        $user->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return view('auth/login');


>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
<<<<<<< HEAD
        return view('admin.edite');
=======
        $updates = User::find($id);
        return view('pages/admin/edit', compact('updates'));
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        //
=======
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sexe = $request->sexe;
        $user->profession = $request->profession;
        $user->save();

        return redirect('admin');
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        //
=======
        $destroy = User::find($id);
        $destroy->delete();

        return redirect('admin');
>>>>>>> 139e522644029508b0a6f96720799123a37b35fe
    }
}
