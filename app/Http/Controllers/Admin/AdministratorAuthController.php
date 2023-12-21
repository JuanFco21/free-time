<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginSessionRequest;

class AdministratorAuthController extends Controller
{
    public function create(LoginSessionRequest $request)
    {
        $request->authenticate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('frontend.login');
    }
}
