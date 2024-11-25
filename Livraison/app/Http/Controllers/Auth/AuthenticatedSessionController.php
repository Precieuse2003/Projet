<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $cleDansLeCache = 'code';

        cache()->put($cleDansLeCache, $code);

        // Envoi de l'email sans utiliser une classe dédiée
        $mailData = [
            'title' => 'Help us protect your account',
            'body' => cache()->get($cleDansLeCache)
        ];

        Mail::send([], $mailData, function ($message) use ($request, $mailData) {
            $message->to($request->email)
                    ->subject('Help us protect your account')
                    ->text('This is the text content of the mail.');

        });
        // $userType = Auth::user()->type;
        // return redirect('/');
        // switch ($userType) {
        //     case 'client':
        //         return redirect()->route('client.index');
        //         break;
        //     case 'livreur':
        //         return redirect()->route('livreur.index');
        //         break;
        //     case 'administrateur':
        //         return redirect()->route('admin.index');
        //         break;
        //         default:
        //         return redirect('/');
        //         break;
        // }
        return redirect('/');
            }

    public function create()
    {
        return view('auth.login');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
