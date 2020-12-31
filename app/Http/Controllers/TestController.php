<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
// use Request;

/**
 * 
 */
class TestController extends Controller
{
	public function test (Request $Request){
		$Request = $Request['id'];
		if ($Request) {
			$data = DB::table('user')->get();
		}else{
			$data = 0;
		}
		return response()->json($data);
	}

	public function mallIndex (Request $Request){
    $type = $Request['type'];
    $page = $Request['page'] - 1;
    if ($type == 'pop') {
      $data = DB::table('mall_index')->where('type',1)->skip(4*$page)->limit(4)->get();  
    }else if($type == 'news'){
      $data = DB::table('mall_index')->where('type',2)->skip(4*$page)->limit(4)->get();
    }else if($type == 'sell'){
      $data = DB::table('mall_index')->where('type',3)->skip(4*$page)->limit(4)->get();
    }else{
      $data = [];
    }


    if($data){
      $res = ['msg' => 'ok', 'list' => $data ];
    }else{
      $data = 0;
      $res = ['msg' => 'no', 'res' => $data,'type' => $type];
    }
    return response()->json($res);
  }
}