<?php
/**
 * Created by PhpStorm.
 * User: Logan
 * Date: 2018-05-31
 * Time: 9:07 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Response;

class JsonResponse
{

    static function success($result = [], $message = "Success")
    {
        return Response::json([
            "ok" => true,
            "code" => 200,
            "message" => $message,
            "direct" => null,
            "data" => $result,
        ]);
    }

    static function fail($message, $code = 400)
    {
        return Response::json([
            "ok" => false,
            "code" => $code,
            "message" => $message,
            "direct" => null,
            'data' => null,
        ], $code);
    }

    static function errors($errors)
    {
        return Response::json([
            'error' => true,
            'message' => 'Multiple errors',
            'errors' => $errors
        ]);
    }


}
