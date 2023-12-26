<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function validarToken(string $token): RedirectResponse
    {
        $tokenCriptografado = Token::first();
        if (!Hash::check($token, $tokenCriptografado->valor)) {
            return redirect("principal");
        }
    }
}
