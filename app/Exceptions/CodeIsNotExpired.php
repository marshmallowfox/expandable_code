<?php

namespace App\Exceptions;

use RuntimeException;

class CodeIsNotExpired extends RuntimeException
{
    public static function make(): static
    {
        return new self('Code is not expired', 400);
    }
}
