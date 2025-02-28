<?php

namespace App\Http\Controllers;

use App\Contracts\ICodeRepository;
use App\Enums\CodeSenderHandlers;
use App\Events\SendCode;
use App\Exceptions\CodeIsNotValid;
use App\Http\Requests\CodeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    public function __construct(
        private readonly ICodeRepository $repository
    )
    {
    }

    /**
     * @param CodeRequest $request
     * @param User $user
     * @return Response
     * @throws RandomException
     */
    public function example(CodeRequest $request, User $user): Response
    {
        $code = $request->input('code');

        if (!$code) {
            $randomCode = random_int(10000, 99999);

            $this->repository->create($randomCode, $user->id);
            event(new SendCode((string) $randomCode, CodeSenderHandlers::Console));

            return response()->json('Code was sent');
        }

        if (!$this->repository->check((string) $code, $user->id)) {
            throw CodeIsNotValid::make();
        }

        // Здесь можно писать логику изменения, либо вынести её в юзкейс

        $this->repository->destroy($user->id);

        return response()->json('Code is valid');
    }
}
