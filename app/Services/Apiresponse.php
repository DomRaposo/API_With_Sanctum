<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class Apiresponse
{
    public static function success($data): JsonResponse
    {
        return response()->json([
            'status_code' => 200,
            'message' => 'Success',
            'data' => $data
        ],200);
    }

    public static function error($message): JsonResponse
    {
        return response()->json([
            'status_code' => 500,
            'message' => $message
            
        ],500);
    }

    public static function unauthorized(): JsonResponse
    {
        return response()->json([
            'message' => 'Unauthorized access'
            
        ],401);
    }
}