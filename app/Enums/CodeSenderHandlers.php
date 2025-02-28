<?php

namespace App\Enums;

// Enum используется, как гарант, что
// Каждое назначенное будет иметь реализацию
// И будет назначено в едином месте
enum CodeSenderHandlers: int
{
    case Telegram = 0;
    case VK = 1;
    case Email = 2;
    case Console = 3;
}
