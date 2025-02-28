<?php

namespace App\Services\SendCode;

use App\Contracts\ICodeSender;

class TelegramSendCode implements ICodeSender
{
    public function __construct()
    {
    }

    public function send(string $code): void
    {
        // TODO: Implement send() method.
    }
}
