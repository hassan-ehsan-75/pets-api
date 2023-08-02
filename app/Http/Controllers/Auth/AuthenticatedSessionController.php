<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {

        $request->authenticate();

        auth()->user()->tokens()->delete();

        $data=array_merge(\auth()->user()->toArray(),
            ['token'=>auth()->user()->createToken('api-token')->plainTextToken]);

        return $this->success($data,'logged in successfully',200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        Auth::user()->tokens()->delete();

        return $this->success([],'logged out successfully',200);
    }
}
