<?php 
namespace App\Http\Controllers\Traits;
use Illuminate\Http\Response;

trait ResponseJson
{
    function responseSuccess($data) {
        return response()->json([
            'data' => $data
        ], Response::HTTP_OK);
    }

    function responseUnvalidated($messages) {
        return response()->json([
            'errors' => $messages
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    function responseUnauthorized($messages) {
        return response()->json([
            'errors' => $messages
        ], Response::HTTP_UNAUTHORIZED);
    }

    function responseDenied($messages) {
        return response()->json([
            'errors' => $messages
        ], Response::HTTP_FORBIDDEN);
    }

    function responseForbbidden($messages) {
        return response()->json([
            'errors' => $messages
        ], Response::HTTP_FORBIDDEN);
    }

    function responseError($messages) {
        return response()->json([
            'errors' => $messages
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
