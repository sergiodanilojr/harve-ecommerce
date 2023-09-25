<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (!auth()->attempt(['email' => $email, 'password' => $password])) {
            throw new \Exception('It is not possible authenticate here!');
        }

        $token = $request->user()->createToken('access_token');

        return response()->json([
            'access_token' => $token->plainTextToken,
            // 'expires_at' => now()->addHours(2),
        ]);
    }
}
