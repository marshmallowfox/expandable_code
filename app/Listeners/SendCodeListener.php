<?php

namespace App\Listeners;

use App\Contracts\ICodeSender;
use App\Enums\CodeSenderHandlers;
use App\Factories\CodeSenderHandlersFactory;
use App\Services\SendCode\EmailSendCode;
use App\Services\SendCode\TelegramSendCode;
use App\Services\SendCode\VKSendCode;
use Illuminate\Contracts\Container\Container;
use App\Events\SendCode;
use InvalidArgumentException;
use Psr\Container\ContainerExceptionInterface;

readonly class SendCodeListener
{
    public function __construct(
        private CodeSenderHandlersFactory $factory
    )
    {
    }

    /**
     * @throws ContainerExceptionInterface
     */
    public function handle(SendCode $e): void
    {
        $handler = $this->factory->make($e->handler);

        // Метрики делать тут делать не желательно, у нас ивенты, мы можем просто создать новый слушатель

        $handler->send($e->message);
    }
}
