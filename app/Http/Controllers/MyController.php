<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;
// use App\Testa;
// use App\Test;
use App\Driver;
class MyController extends Controller
{
    public function index(){
        // $driver = driver::all();
        // return response()->json($driver);
        // echo "hello";
     }
     public function create(Request $request){
       
        
     }
     public function store(Request $request){
        // return 123;
       
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
             'email' => 'required|email|unique:Drivers'
        ]);

        if($validator->fails()){
            $response = array('response'=>$validator->messages(), 'success'=>false);
            return $response;
        }
        else{
            //function to generate the driver's id
            function unique_linka($length=10) {

                $string = '';
                // You can define your own characters here.
                $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";
                 
                    for ($p = 0; $p < $length; $p++) {
                        $string .= $characters[mt_rand(0, strlen($characters)-1)];
                    }
                 
                    return $string;
             
             }
             
            $ref = unique_linka(6);
            $driver_id = "A2B-".$ref; // driver's id generated
            var_dump($driver_id);

             //function to generate the driver's password
             function unique_link($length=10) {

                $string = '';
                // You can define your own characters here.
                $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
                 
                    for ($p = 0; $p < $length; $p++) {
                        $string .= $characters[mt_rand(0, strlen($characters)-1)];
                    }
                 
                    return $string;
             
             }
             
            $password = unique_link(10); // driver's password generated
            var_dump($password);
           
            //register
        // $register = new Testa();
        $register = new Driver();
        $register->first_name = $request->first_name;
        $register->last_name = $request->last_name;
        $register->phone_no = $request->phone_no;
        $register->address = $request->address;
         $register->email = $request->email;
        $register->driver_id = $driver_id;
        $register->password = $password;
        // $post->user_id = auth()->user()->id;
        $register->save();
        return json_encode(["status"=>200,"registered successfully!"=>$register]);
        }

     }
    
     public function show($id){
        $driver = driver::find($id);
        return response()->json($driver);
     }
     public function edit($id){
        echo 'edit';
     }
     public function update(Request $request, $id){
        echo 'update';
     }
     public function destroy($id){
        echo 'destroy';
     }

      public function doLogin(request $request){
          $driver = $request->input('driver_id');
          $password = $request->input('password');
          $data=DB::select('select id from drivers where driver_id=? and password=?',[$driver,$password]);
     
      if(count($data))
      {
        return json_encode(["status"=>200,"Login successfully!"=>$data]);
      }
      else{
        return json_encode(["status"=>400,"Please register now!"=>$data]);
      }  
    echo "hello";
    }           
}
