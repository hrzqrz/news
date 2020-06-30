<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DbController extends Controller
{
    public function index()
    {
        $all = DB::table('employee')->get();
        $all2 = DB::table('employee')->select('name')->get();
        $pluck = DB::table('employee')->pluck('name');
        $first = DB::table('employee')->first();
        $orderBy = DB::table('employee')->orderBy('id', 'ASC')->get();
        $count = DB::table('employee')->count();
        $limit = DB::table('employee')->orderBy('id', 'DESC')->limit(1)->get();
        $offset = DB::table('employee')->orderBy('id', 'DESC')->offset('0')->limit(1)->get();
        dd($offset);
    }

    public function joining()
    {
        $result = DB::table('ordertable')->join('usertable', 'usertable.id', '=', 'ordertable.user_id')->get();
        $result1 = DB::table('ordertable')->join('usertable', 'usertable.id', '=', 'ordertable.user_id')
                                          ->select('usertable.name', 'ordertable.amount', 'ordertable.status')
                                          ->get();
                                    
        $result3 = DB::table('ordertable')->join('usertable', 'usertable.id', '=', 'ordertable.user_id')
                                          ->select('ordertable.amount')
                                          ->where('status', 1)
                                          ->orderBy('amount', 'DESC')->get();
        dd($result3);
    }
}
