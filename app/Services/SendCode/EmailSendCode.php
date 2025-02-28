<?php

namespace App\Services\SendCode;

use App\Contracts\ICodeSender;

class EmailSendCode implements ICodeSender
{
    public function __construct()
    {
    }

    public function send(string $code): void
    {
    }
}
