<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Tymon\JWTAuth\Exceptions\JWTException ;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use Session; 

use App\User;

use App\Booking;

use Auth;

use Image;

use JWTAuth;



class AuthController extends Controller

{
	// function __construct()
	// {
	// 	$this->middleware('jwt.auth')->only('hostel');
	// }

	public function home(Request $request)
	{
		return view('auth/home');
	}

	

	public function contact(Request $request)
	{
		return view('auth/contact');
	}


	public function register(Request $request)
	{
		$this->validate($request, [
			'fname'=> 'required|string',
			'gender' => 'required',
			'matric' => 'required',
			'course' => 'required',
			'college' => 'required',
			'email'=> 'required|email|unique:users',
			'kinName' => 'required',
			'phone' => 'required',
			'relationship' => 'required',
			'password' => 'required|min:5',
		]);

		// $user = $request ->file('upload');
		// $filename = $user->getClientOriginalName();
		// $user->move('student', $filename);
	
		$user = new User(); 
		$user->fname = $request->fname;
		$user->gender = $request->gender;
		$user->matric = $request->matric;
		$user->course = $request->course;
		$user->college = $request->college;
		$user->email = $request->email;
		$user->kinName = $request->kinName;
		$user->phone = $request->phone;
		$user->relationship = $request->relationship;
		$user->password = bcrypt($request->password);
		// $user->upload =$filename; 
		$user->save();
		return response()->json([
			'message' => 'Successfully registered student !'
		], 200);
	}

	public function hostelName(Request $request)
	{
	
		$booking = new Booking();
		$booking->student = $request->student;
		$booking->hostel = $request->hostel;
		$booking->save();
		return response()->json([
			'message' => 'Hostel Booked!'
		], 200);
	}

	public function login(Request $request)
	{	

		$this->validate($request, [
			'password' => 'required|min:5',
			'matric' => 'required'
		]);

		$credentials = $request->only('password','matric');
		try{
			if ( !$token = JWTAuth::attempt($credentials)) {

				return response()->json(['status' =>'Invalid User Details or  credentials!'], 401);
			}
		}catch(JWTException $e){

			return response()->json(['status' =>'Could not create token!'], 500);
		}
		session(['matric' => $request->matric]);
		return response()->json([
			'token'=> $token
		], 200);
	}

// this where i want to display the details 
	public function hostel()
	{	
		return view('auth/hostel');
		
	}

	public function getUser(Request $request, $matric, $column=['matric'])
	{		
		$matric = Session::get('matric');  
		$user = DB::table('users')->where('matric', $matric)->first();
		return ['user' => $user];	
	}

//here fetch all registered user
	public function show()
    {
       $users = User::all();
       return view('admin.views', compact('users'));
    }

    public function userDestroy($id)
	{

		$user = User::destroy($id);

		Session::flash('flash_message', 'Student deleted!');
		return redirect('admin/views');
	}

}
