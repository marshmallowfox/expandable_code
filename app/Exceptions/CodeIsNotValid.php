<?php

namespace App\Exceptions;

use RuntimeException;

class CodeIsNotValid extends RuntimeException
{
    public static function make(): static
    {
        return new self('Code is not valid', 400);
    }
}
