<?php

namespace App\Helpers;

/**
 * Format response.
 */
class ResponseFormatter
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'data' => [
            'code' => 200,
            'success' => true,
            'message' => null,
            'lobj' => null,
        ],

    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null)
    {
        self::$response['data']['message'] = $message;
        self::$response['data']['lobj'] = $data;

        return response()->json(self::$response, self::$response['data']['code']);
    }

    /**
     * Give error response.
     */
    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['data']['success'] = false;
        self::$response['data']['code'] = $code;
        self::$response['data']['message'] = $message;
        self::$response['data']['lobj'] = $data;

        return response()->json(self::$response, self::$response['data']['code']);
    }
}
