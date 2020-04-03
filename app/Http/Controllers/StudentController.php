<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test1()
    {

        /*$bool = DB::insert('insert into student(name, age) value(?, ?)', ['imooc', 19]);
        var_dump($bool);*/
        /*$num = DB::update('update student set age = ? where name = ?', [20, 'sean']);
        var_dump($num);*/
        /*$student = DB::select('select * from student where id > ?' ,[1]);
        dd($student);*/
        /*$sum = DB::delete('delete from student where id > ?', [1]);
        var_dump($sum);*/
    }
    public function query1()
    {
        //新增
//        /*$bool = DB::table('student')->insert(
//            ['name' => 'imooc', 'age' => 18]);
//        var_dump($bool);*/
        /*$id = DB::table('student')->insertGetId(['name' => 'sean','age' => '18']);
        var_dump($id);*/
        /*$bool = DB::table('student')->insert(
            [['name' => 'name1', 'age' => '20'],
            ['name' => 'name2', 'age' => '21']]);
        var_dump($bool);*/
    }
    public function query2()
    {
        //更新
        /*$num = DB::table('student')
            ->where('id', 3)
            ->update(['age' => 30]);
        var_dump($num);*/
        /*$sum = DB::table('student')
            ->where('id', 5)
            ->decrement('age', 3);
        var_dump($sum);*/
        /*$sum = DB::table('student')
            ->where('id', 5)
            ->decrement('age', 3, ['name' => 'imooc']);
        var_dump($sum);*/

        //删除
        /*$num = DB::table('student')
            ->where('id','>=', 8)
            ->delete();
        var_dump($num);*/

        //查询
        /*$students = DB::table('student')->get();*/
        /*$students = DB::table('student')
            ->orderBy('id', 'desc')
            ->first();
        dd($students);*/
        /*$students = DB::table('student')
            ->where('id', '>=', '5')
            ->get();
        dd($students);*/

        //where 多条件
        /*$students = DB::table('student')
            ->whereRaw('id >= ? and age > ?', ['5', 18])
            ->get();
        dd($students);*/

        //pluck 返回结果集中指定字段
        /*$students = DB::table('student')
            ->whereRaw('id >= ? and age > ?', ['5', 18])
            ->pluck('name');
        dd($students);*/

        //select
        /*$students = DB::table('student')
            ->select('id', 'name', 'age')
            ->get();
        dd($students);*/

        //chunk 分段获取
        /*echo '<pre>';
        $students = DB::table('student')
            ->chunkById('2', function($students)
            {
                var_dump($students);
                return false;  //只查一次
            });*/

        /*//聚合函数 count max min avg sum
        $sum = DB::table('student')->count();
        var_dump($sum);
        $max = DB::table('student')->max('age');
        $min = DB::table('student')->min('age');
        $avg = DB::table('student')->avg('age');
        $sum = DB::table('student')->sum('age');
        var_dump($sum);
        var_dump($max);
        var_dump($min);
        var_dump($avg);*/
    }

    //Eloquent ORM
    public function orm1()
    {
        //all()
//        $students = Student::all();
        //find()
//        $student = Student::find(1);

        //findOrFail()
//        $student = Student::findOrFail(2);

//        $student = Student::get();
        /*$student = Student::where('id', '>', '3')
            ->orderBy('age', 'desc')
            ->first();
        dd($student);*/

        /*echo '<pre>';
        Student::chunk(2, function ($student){
            var_dump($student);
        });

        Student::count();
        Student::max('age');*/

    }
    public function orm2()
    {
        //使用模型新增数据
        $student = new Student();
        $student->name = 'ean';
        $student->age = 18;
        $bool = $student->save();
        dd($bool);
    }
}