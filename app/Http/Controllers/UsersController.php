<?php

namespace App\Http\Controllers;

use App\Exceptions\CodeException;
use App\Http\Resources\ShopProductListResource;
use App\Http\Resources\UsersResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    //列表
    public function list(Request $request)
    {
        $size = $request->input('size');
        $data = Customer::query()
            ->with(['address' => function($query) {
                $query->select('user_id', 'addr')->where('is_default', 1);
            }])->whereHas("address", function ($query) {
                $query->where('is_default', 1);
            })->paginate($size)->toArray();
        return success([
            'code' => 0,
            'message' => 'success',
            'data' => $data['data'],
            'meta' => [
                'total'        => $data['total'],
                'per_page'     => $data['per_page'],
                'current_page' => $data['current_page'],
                'last_page'    => $data['last_page']
            ]
        ]);
    }
    //详情
    public function select(Request $request)
    {
        $data = $request->only('id');
        $cus = Redis::get('game'.':'.'user'.':'.$data['id']);
        $cus = json_decode($cus);
        if (!$cus) {
            Log::error(['aa'=>1,'bb'=>2]);
            $cus = Customer::query()
                ->Where('id', $data['id'])
                ->first();
            if (!$cus){
                throw new CodeException(1003);
            }
            $cus = $cus->toArray();

            Redis::set('game'.':'.'user'.':'.$data['id'], json_encode($cus));
        }
        return success($cus);
    }
    //删除
    public function delete(Request $request)
    {
        $data = $request->input('id');
        Redis::del($data);
//            Log::error(json_encode(0));
        Customer::query()
            ->where('id', $data)
            ->delete();
        return success();
    }
    //更新
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'tel' => 'required|digits:5'
        ]);
        $data = $request->only(['id', 'name', 'tel', 'sex']);
        $cus = Customer::query()
            ->Where('id', $data['id'])
            ->first();
        if (!$cus){
            throw new CodeException(1004);
        }
        Customer::query()
            ->where('id', $data['id'])
            ->update([
            'name' => $data['name'],
            'tel' => $data['tel'],
            'sex' => $data['sex'],
            ]);
        Redis::del($data['id']);
        return success();
    }
    //新增
    public function create(Request $request)
    {
        $data = $request->only(['name', 'tel', 'sex']);
        $request->validate([
            'name' => 'required|min:3',
            'tel' => 'required|digits:5',
            'sex' => 'required',
        ]);
        if (Customer::query()
            ->where('name', $data['name'])
            ->first()) {
            throw new CodeException(1002);
        }
        Customer::query()->create([
            'name' => $data['name'],
            'tel' => $data['tel'],
            'sex' => $data['sex'],
            ]);
        return success();
    }
}
