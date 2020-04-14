<?php

namespace App\Http\Controllers;

use App\Address;
use App\Exceptions\CodeException;
use App\Models\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //列表
    public function list(Request $request)
    {
        $size = $request->input('size');
        $data = Address::query()->paginate($size);
        return success($data);
    }
    //新增
    public function create(Request $request)
    {
        $data = $request->only(['user_id', 'addr']);
        $request->validate([
            'user_id' => 'required',
            'addr' => 'required'
        ]);
        if (Address::query()
            ->where('user_id', $data['user_id'])
            ->where('addr', $data['addr'])
            ->exists()) {
            throw new CodeException(1006);
        }
        Address::query()->create([
            'user_id' => $data['user_id'],
            'addr' => $data['addr']
        ]);
        return success();
    }
    //删除
    public function delete(Request $request)
    {
        $data = $request->only('id');
        $request->validate([
            'id' => 'required',
        ]);
        Address::query()
            ->where('id', $data['id'])
            ->delete();
        return success();
    }
    //默认地址
    public function is_default(Request $request)
    {
        $data = $request->input('id');
        $user_id = Address::query()->where('id', $data)->value('user_id');
        Address::query()->where('user_id', $user_id)->update(['is_default' => 0]);
        Address::query()->where('id', $data)->update([
            'is_default' => 1
        ]);
        return success();
    }
}
