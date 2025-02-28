<?php

namespace App\Exceptions;

use InvalidArgumentException;

class UnknownCodeSenderHandlerException extends InvalidArgumentException
{
    public static function make(): static
    {
        return new self('Unknown code sender handler', 500);
    }
}
