<?php

namespace App\Http\Controllers;

use App\Enums\CodeSenderHandlers;
use App\Events\SendCode;
use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ExampleController extends BaseController
{
    /**
     * @return Response
     * @throws RandomException
     */
    public function example(): Response
    {
        event(new SendCode(random_int(10000,99999), CodeSenderHandlers::Console));

        return new JsonResponse('Code was sent');
    }
}
