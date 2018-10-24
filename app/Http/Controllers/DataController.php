<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function index($key){
      $keydata = app('db')->table('keys')->where('key', $key)->limit(1)->value('key');
      if(is_null($keydata)){
        return response()->json("key not found", 404);
      }else{
      	$results = app('db')->table('data')->where('key', $key)->select('tag', 'value', 'updated_at')->get();
        foreach($results as $result){
          $result->tag = substr(strstr($result->tag, "."), 1);
        }
        return response()->json($results, 200);
      }
    }

    public function store($key, Request $request){
      $keydata = app('db')->table('keys')->where('key', $key)->limit(1)->value('key');
      if(is_null($keydata)){
        return response()->json("key not found", 404);
      }else{
        $tag = $request->input('tag');
        if(is_null($tag) || strlen($tag) == 0){
          return response()->json("tag not sent", 404);
        }
        $value = $request->input('value');
        if(is_null($value)){
          $value = "";
        }
        $keytag = $key . '.' . $tag;
        $current = app('db')->table('data')->where('key', $key)->where('tag', $keytag)->limit(1)->value('value');
        if(is_null($current)){
          app('db')->table('data')->insert(['key' => $key, 'tag' => $keytag, 'value' => $value, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }else{
          app('db')->table('data')->where('key', $key)->where('tag', $keytag)->update(['value' => $value, 'updated_at' => Carbon::now()]);
        }
        $return = array("STORED", $tag, $value);
        return response()->json($return, 200);
      }
    }

    public function get($key, Request $request){
      $keydata = app('db')->table('keys')->where('key', $key)->limit(1)->value('key');
      if(is_null($keydata)){
        return response()->json("key not found", 404);
      }else{
        $tag = $request->input('tag');
        if(is_null($tag) || strlen($tag) == 0){
          return response()->json("tag not sent", 404);
        }
        $keytag = $key . '.' . $tag;
        $value = app('db')->table('data')->where('key', $key)->where('tag', $keytag)->limit(1)->value('value');
        if(is_null($value)){
          $value = "";
        }
        $return = array("VALUE", $tag, $value);
        return response()->json($return, 200);
      }
    }

    public function home(){
      return view('index');
    }

    public function dump(){
      $keys = app('db')->table('keys')->select('key', 'created_at')->orderBy('key')->get();
      $data = app('db')->table('data')->select('tag', 'value', 'created_at', 'updated_at')->orderBy('tag')->get();
      $output['keys'] = $keys;
      $output['data'] = $data;
      return response()->json($output, 200);
    }

    public function newKey(Request $request){
      $key = $request->input('key');
      if(is_null($key) || strlen($key) == 0){
        return response()->json("key not sent", 404);
      }
      $current = app('db')->table('keys')->where('key', $key)->limit(1)->value('key');
      if(is_null($current)){
        app('db')->table('keys')->insert(['key' => $key, 'created_at' => Carbon::now()]);
      }else{
        return response()->json("key exists", 403);
      }
      return response()->json("key created", 200);
    }

    public function deleteKey(Request $request){
      $key = $request->input('key');
      if(is_null($key) || strlen($key) == 0){
        return response()->json("key not sent", 404);
      }
      $current = app('db')->table('keys')->where('key', $key)->limit(1)->value('key');
      if(is_null($current)){
        return response()->json("key does not exist", 403);
      }else{
        app('db')->table('keys')->where('key', $key)->delete();
        app('db')->table('data')->where('key', $key)->delete();
      }
      return response()->json("key deleted", 200);
    }

}
