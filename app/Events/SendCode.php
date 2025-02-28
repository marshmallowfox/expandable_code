<?php

namespace App\Events;

use App\Enums\CodeSenderHandlers;
use Illuminate\Foundation\Events\Dispatchable;

// Почему используем ивенты?
// Их легко подключить с любого места кода
// Их без проблем переделать под очереди
// Дабы пользователь не ждал успешной отправки
class SendCode
{
    use Dispatchable;

    public function __construct(
        public readonly string $message,
        public readonly CodeSenderHandlers $handler
    )
    {
    }
}
