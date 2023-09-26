<?php

namespace App\Services\Auth;

use App\Exceptions\AuthException;

class LoginService
{
    public function execute(string $email, string $password):string
    {
        if (!auth()->attempt(['email' => $email, 'password' => $password])) {
            throw new AuthException();
        }

        $token = auth()->user()->createToken('access_token');

        return $token->plainTextToken;
    }
}
