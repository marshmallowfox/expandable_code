<?php

namespace App\Exceptions;

use RuntimeException;

class CodeIsFailedToCreate extends RuntimeException
{
    public static function make(): static
    {
        return new self('Cannot create the code', 500);
    }
}
