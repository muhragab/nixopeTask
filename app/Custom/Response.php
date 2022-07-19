<?php

use App\Trait\Response as Response;

function sendResponse($result, $message)
{
    return response()->json(Response::makeResponse($message, $result));
}

function sendError($error, $code = 404)
{
    return response()->json(Response::makeError($error), $code);
}

function sendSuccess($message)
{
    return response()->json([
        'success' => true,
        'message' => $message
    ], 200);
}
