<?php

namespace App\Helper;

class Helper
{
    public static function response_success($status = false, $data = null, $message = '')
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]);
    }
    public static function response_error($message = '', $statusCode)
    {
        return response()->json([
            'status' => false,
            'data' => null,
            'message' => $message
        ], $statusCode);
    }
}
