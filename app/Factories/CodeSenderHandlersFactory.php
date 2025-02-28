<?php

namespace App\Factories;

use App\Contracts\ICodeSender;
use App\Enums\CodeSenderHandlers;
use App\Exceptions\NotImplementedCodeSenderHandlerException;
use App\Exceptions\UnknownCodeSenderHandlerException;
use App\Services\SendCode\ConsoleSendCode;
use App\Services\SendCode\EmailSendCode;
use App\Services\SendCode\TelegramSendCode;
use App\Services\SendCode\VKSendCode;
use Illuminate\Contracts\Container\Container;
use Psr\Container\ContainerExceptionInterface;

readonly class CodeSenderHandlersFactory
{
    public function __construct(
        private Container $container
    )
    {
    }

    /**
     * @throws ContainerExceptionInterface
     */
    // Фабрику вынес из слушателя по принципу авось будет где-то использоваться и не должно затрагивать метрики
    public function make(CodeSenderHandlers $e): ICodeSender
    {
        // Default назначен на случай, если Enum дополнили, а обработчик забыли установить, как защиту от дурака
        // DI мы используем на случай сложных конструкторов и подмены библиотек
        $handler = match ($e) {
            CodeSenderHandlers::VK       => $this->container->make(VKSendCode::class),
            CodeSenderHandlers::Telegram => $this->container->make(TelegramSendCode::class),
            CodeSenderHandlers::Email    => $this->container->make(EmailSendCode::class),
            CodeSenderHandlers::Console  => $this->container->make(ConsoleSendCode::class),
            default => throw UnknownCodeSenderHandlerException::make(),
        };

        if (!($handler instanceof ICodeSender)) {
            throw NotImplementedCodeSenderHandlerException::make();
        }

        return $handler;
    }
}
