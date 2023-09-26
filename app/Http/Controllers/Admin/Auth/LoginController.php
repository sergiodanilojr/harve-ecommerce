<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct(
        private LoginService $service
    )
    {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       $token = $this->service->execute(
           email: $request->email,
           password: $request->password
       );

        return response()->json([
            'access_token' => $token,
            // 'expires_at' => now()->addHours(2),
        ]);
    }
}
