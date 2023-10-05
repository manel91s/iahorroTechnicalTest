<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ValidatorRequest
{
    public static function validate(Request $request): void
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new BadRequestHttpException('Invalid data', null, 400);
        }
    }
}
