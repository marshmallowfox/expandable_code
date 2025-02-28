<?php

namespace App\Repositories;

use App\Contracts\ICodeRepository;
use App\Exceptions\CodeIsFailedToCreate;
use App\Exceptions\CodeIsNotExpired;
use App\Models\Code;

readonly class ModelCodeRepository implements ICodeRepository
{
    public function __construct(
        private Code $Code
    )
    {
    }

    public function create(string $code, int $userId): void
    {
        $expireAt = $this->Code->where(['user_id' => $userId])->first(['created_at'])?->created_at;

        if ($expireAt !== null && $expireAt->diffInMinutes(now()) < 1) {
            throw CodeIsNotExpired::make();
        }

        if ($expireAt !== null) {
            $this->destroy($userId);
        }

        if ($this->Code->create(['code' => $code, 'user_id' => $userId]) === false) {
            throw CodeIsFailedToCreate::make();
        }
    }

    public function check(string $code, int $userId): bool
    {
        return $this->Code->where(['code' => $code, 'user_id' => $userId])->exists();
    }

    public function destroy(int $userId): void
    {
        $this->Code->where(['user_id' => $userId])->delete();
    }
}
