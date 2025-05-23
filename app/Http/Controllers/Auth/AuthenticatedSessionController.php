<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Grabar login in time
        grabarLoginTime();

        // notyf()->success('Haz iniciado sesión con éxito.');
        flash()->success(__('Haz iniciado sesión con éxito!'));

        return redirect()->intended(route('dashboard', absolute: false));
        // return redirect()->intended(route('profile.actividades.index'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // dd($request->all());

        // Validate
        $request->validate([
            'description' => ['nullable'],
        ]);
        // Grabar logout time
        grabarLogoutTime($request->description);


        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // notyf()->success('Haz cerrado sesión con éxito.');
        flash()->success(__('Haz cerrado sesión con éxito.'));

        return redirect('/');
    }
}
