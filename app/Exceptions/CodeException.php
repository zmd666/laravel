<?php

namespace App\Exceptions;

use Exception;

class CodeException extends Exception
{
    const HTTP_OK = 200;
    protected $data;
    protected $code;
    public function __construct($code, $data = [])
    {
        $this->code = $code;
        $this->data = $data;
    }
    public function render()
    {
        $content = [
            'message' => getErrorMessage($this->code),
            'code'    => $this->code,
            //            'timestamp' => time(),
        ];
        if ($this->data) {
            $content = array_add($content, 'data', $this->data);
        }
        return response()->json($content, self::HTTP_OK);
    }
}