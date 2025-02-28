<?php

namespace App\Contracts;

// Универсальный интерфейс отправки сообщений
// Всё нужное (SMTP, ключ ТГ, и прочее) должно задаваться в конструкторе
// Таким образом при Opcache или же RoadRunner значительно сократит инициализацию
interface ICodeSender
{
    public function send(string $code): void;
}
