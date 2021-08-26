<?php

namespace App\Traits;

trait ResponseAPI
{
    /**
     * Core of response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode  
     * @param   boolean         $isSuccess
     */
    public function sendResponse($result , $message)
    {
        $response = [
         'success' => true,
         'data' => $result,
         'message' => $message
        ];
        return response()->json($response , 200);
    }
 
    public function sendError($error , $errorMessage=[] , $code = 404)
    {
        $response = [
         'success' => false,
         'data' => $error
        ];
        if (!empty($errorMessage)) {
         $response['data'] = $errorMessage;
        }
        return response()->json($response , $code);
    }
}