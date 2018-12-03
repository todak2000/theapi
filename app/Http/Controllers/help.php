<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class help extends Controller
{
    public function doLogin(request $request){
        //       $driver = $request->input('driver_id');
        //       $password = $request->input('password');
        //       $data=DB::select('select id from drivers where driver_id=? and password=?',[$driver,$password]);
         
        //   if(count($data))
        //   {
        //     return json_encode(["status"=>200,"Login successfully!"=>$data]);
        //   }
        //   else{
        //     return json_encode(["status"=>400,"Please register now!"=>$data]);
        //   }  
        echo "hello";
        }    
}
