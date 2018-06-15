<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
      	$results = app('db')->table('data')->select('key', 'value')->get();
        return response()->json($results, 200);
    }

    public function store(Request $request){
      $tag = $request->input('tag');
      if(is_null($tag) || strlen($tag) == 0){
        return response()->json("Tag not sent", 404);
      }
      $value = $request->input('value');
      if(is_null($value)){
        $value = "";
      }
      $current = app('db')->table('data')->where('key', $tag)->limit(1)->value('value');
      if(is_null($current)){
        app('db')->table('data')->insert(['key' => $tag, 'value' => $value]);
      }else{
        app('db')->table('data')->where('key', $tag)->update(['value' => $value]);
      }
      $return = array("STORED", $tag, $value);
      return response()->json($return, 200);
    }

    public function get(Request $request){
      $tag = $request->input('tag');
      if(is_null($tag) || strlen($tag) == 0){
        return response()->json("Tag not sent", 404);
      }
      $value = app('db')->table('data')->where('key', $tag)->limit(1)->value('value');
      if(is_null($value)){
        $value = "";
      }
      $return = array("VALUE", $tag, $value);
      return response()->json($return, 200);
    }

    //
}
