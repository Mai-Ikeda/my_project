<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $records = DB::connection('mysql')->select("select * from users"); // query 実行処理 実行結果を $records に代入
        $name = $records[0]->name;

        //$insertResult = DB::connection("mysql")->insert("insert into users (id,email,name,password) values (null,'d@d','ddd','def')");
        //dd($insertResult);

        $deleteResult = DB::connection("mysql")->delete("delete from users where name = 'aaa'");
        dd($deleteResult);


        return view("sample/index", []);
    }
}
