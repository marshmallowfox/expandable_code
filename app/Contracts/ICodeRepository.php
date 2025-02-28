<?php

namespace App\Contracts;

// Репозиторий нужен для вариативности, кто-то хочет хранить в Postgres, кто-то в Redis, кто-то ещё где
interface ICodeRepository
{
    public function create(string $code, int $userId): void;

    public function check(string $code, int $userId): bool;

    public function destroy(int $userId): void;
}
