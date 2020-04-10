<?php
function getErrorMessage($code)
{
    $err = require_once __DIR__.'/../app/Exceptions/error.php';
    return $err[$code];
}
if (!function_exists('success')) {
    function success($data = [])
    {
        if (empty($data)) {
            return ['code' => 0, 'message' => 'success', 'data' => []];
        }

        return new \App\Http\Resources\Success($data);
    }
}