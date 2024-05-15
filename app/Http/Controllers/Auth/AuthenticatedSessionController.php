<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * npm i react@latest react-dom@latest
     * npm i --save-dev @vitejs/plugin-react
     * 404
     * npm create vite@latest
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {        
        $request->authenticate();

        $request->session()->regenerate();
        if(Auth::user()->usertype == 1){
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        return redirect()->intended(route('profile.edit', absolute: false));
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

    /********************************* */

    protected function authenticated(){
        \Log::debug('An informational message.456');
        \Auth::logoutOtherDevices(request('password'));
    }



}
