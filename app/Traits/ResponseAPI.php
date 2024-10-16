<?php

namespace App\Traits;
use Config;


/**
 * API RESPONSE
 */
trait ResponseAPI
{

    public static function requestSuccessData($data, $message = "Success!", $status = 'success')
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ]);
    }
    public static function requestSuccessWithLog($log, $message = 'Success!')
    {
        return response()->json([
            "status" => "success",
            "message" => $message,
            "log" => $log
        ], 200);
    }
    public function badRequestWithLog($message = 'Failed!')
    {
        return response()->json([
            "status" => "error",
            "message" => $message,
        ], 400);
    }
    public static function requestSuccess($message = 'Success!', $status = 'success', $code = 200)
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
        ], $code);
    }
    public static function badRequest($error = 'bad_request', $message = 'bad_request')
    {
        return response()->json([
            "status" => "error",
            "message" => $message,
            "errors" => $error
        ], 400);
    }
    public static function requestUnauthorized($message, $errors = 'Unauthorized')
    {
        return response()->json([
            "status" => "unautherized",
            "message" => $message,
            "errors" => $errors,
        ], 401);
    }
    public static function requestNotFound($message)
    {
        return response()->json([
            "status" => "not_found",
            "message" => $message,
            'data' => null,
        ], 404);
    }
    public static function requestValidation($errors = [], $message = 'Failed!')
    {
        return response()->json([
            "status" => "error_validation",
            "message" => $message,
            "errors" => $errors
        ], 422);
    }
}
