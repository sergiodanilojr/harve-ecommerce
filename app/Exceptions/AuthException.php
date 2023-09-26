<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    protected $message = 'Unauthenticated';

    public function render()
    {
        return response()->json([
            'message'=>$this->message,
        ], 401);
    }
}
