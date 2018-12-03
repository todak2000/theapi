<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Validation\ValidationException;
use App\Test;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       echo $data = Test::all();  // echo out every item in the table (driver_tbl) connected via the Test.php model
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'email' => 'required',
            
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
        try {
            $hasher = app()->make('hash');
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));
 
            $save = User::create([
                'username'=> $username,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> ''
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration success!';
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  
    public static function register(Request $request)
	{
//		$email=$request->email;
//		$password = md5($request->password);
//
//		$user = DB::table('users')->where('email', $email)->where('password', $password)->first();

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);
        // Create new Post
        $post = new Test;
        $post->first_name = $request->input('first_name');
        $post->last_name = $request->input('last_name');
        $post->phone_no = $request->input('phone_no');
        $post->address = $request->input('address');
        $post->email = $request->input('email');
        // $post->user_id = auth()->user()->id;
        $post->save();
        
		// $credentials = $request->only('email', 'password');

		if ($post) {
            // Authentication passed...
            return json_encode(["status"=>200,"event"=>$post]);
			echo json_encode(["status"=>200,"event"=>$post]);
		} else {
            return json_encode(["status"=>400,"event"=>null]);
			echo json_encode(["status"=>400,"event"=>null]);
		}


	}
}
