<?php

namespace App\Exceptions;

use Exception;

class NaoLogadoException extends Exception
{
    function __construct()
    {
        return redirect()->route("principal");
    }
}