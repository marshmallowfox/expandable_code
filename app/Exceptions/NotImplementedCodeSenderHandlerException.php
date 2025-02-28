<?php

namespace App\Exceptions;

use InvalidArgumentException;

class NotImplementedCodeSenderHandlerException extends InvalidArgumentException
{
    public static function make(): static
    {
        return new self('Handler must implement ICodeSender', 500);
    }
}
