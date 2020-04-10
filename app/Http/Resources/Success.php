<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class Success extends JsonResource
{
    protected $data;

    public static $wrap = null;

    public function __construct($data = [], $resource = null)
    {
        $this->data = $data;

        if (is_null($resource)) {
            $resource = collect();
        }
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        $success = ['code' => 0, 'message' => 'success'];
        $data    = Arr::has($this->data, 'data') ? $this->data['data'] : $this->data;
        $res     = Arr::add($success, 'data', $data);

        if (Arr::has($this->data, 'meta')) {
            $res = Arr::add($res, 'meta', $this->data['meta']);
        }

        return $this->data ? $res : ['code' => 0, 'message' => 'success', 'data' => []];
    }
}
