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

        return $this->redirectBasedOnRole();  // Redirect user based on their role
    }

     /**
     * Redirect the user based on their role.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBasedOnRole(): RedirectResponse
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('adminpanel');  // Redirect to the admin panel route
        }

        return redirect()->route('dashboard');  // Redirect to the dashboard route
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
