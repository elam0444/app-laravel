<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response as BaseResponse;

/**
 * Class Response
 * @package App\Http\Responses
 */
class Response extends BaseResponse
{
    /**
     * Function used to standardize the responses sent to the frontend.
     *
     * @param string $status Response status, can be "success" or "error"
     * @param string $message String describing the response
     * @param array $data Additional data, must be inside an array
     * @return JsonResponse
     */
    public static function buildDefaultResponse($status, $message = "", $data = array())
    {
        $response = array("status" => $status);
        if (!empty($message)) {
            $response['message'] = $message;
        }
        if (!empty($data)) {
            $response['data'] = $data;
        }
        return new JsonResponse($response);
    }
}