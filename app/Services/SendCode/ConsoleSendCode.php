<?php

namespace App\Services\SendCode;

use App\Contracts\ICodeSender;
use Illuminate\Support\Facades\Log;

class ConsoleSendCode implements ICodeSender
{
    public function __construct()
    {
    }

    public function send(string $code): void
    {
        Log::info('Code is ' . $code);
    }
}
