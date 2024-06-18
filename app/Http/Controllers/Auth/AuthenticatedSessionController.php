<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('components.pages.dashboard.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        Alert::toast('Anda berhasil login!', 'success');

        if ($user->role == 'super_admin') {
            // If user is super admin, redirect to super admin dashboard
            return redirect()->route('super_admin.dashboard');
        } else if ($user->role == 'admin') {
            // If user is admin, redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        } else if ($user->role == 'owner') {
            // If user is owner, redirect to owner dashboard
            return redirect()->route('owner.dashboard');
        } else {
            // If user is not admin or unit admin, redirect to index
            return redirect()->route('writer.dashboard');
        }
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
