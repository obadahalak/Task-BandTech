<?php

namespace App\helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    //// Return success message //// 
    public static function successResponse($message=''){
            return[
                    'message'=>$message,
            ];
    }
   
    /// Return the Validation message ////
    public static function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => 'Validation errors',
                    'errors' => $validator->errors(),
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
            ),
        );
    }
}
