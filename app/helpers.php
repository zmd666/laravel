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

if (!function_exists('getPaginateMeta')) {
    /**
     * 正确返回数值
     *
     * @param $obj
     * @return array
     */
    function getPaginateMeta($obj)
    {
        return [
            'meta'    => [
                'total'        => $obj->total(),
                'per_page'     => $obj->perPage(),
                'current_page' => $obj->currentPage(),
                'last_page'    => $obj->lastPage()
            ],
            'code'    => 0,
            'message' => 'success'
        ];
    }
}