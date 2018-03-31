<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Hostel;

use App\User;

use App\Booking;

use App\Backend;

use Session;

use DB;

use Auth;



class adminController extends Controller
{
	public function index(){

		$student = User::all();
		$hostel = Hostel::all();
		$booking = Booking::all();
		return view('admin/index', compact('student', 'hostel', 'booking'));
	}

	public function say(Request $request)
	{
		$this->validate($request, [
			'admin' => 'required'		
		]);
		
		$admin = new Backend();
		$admin->admin = $request->admin;
		$admin->save();

		session(['admin' => $request->admin]);
		Session::flash('flash_message', 'Admin created!');
		return redirect('admin/index');
	}

	public function loggedAdmin()
	{
		return view('admin/login');
	}

	public function hostel(Request $request){

		$this->validate($request, [
			'name'=> 'required|min:5|string',
			'location' => 'required|string',
			'description' => 'required|min:10|string',
			'upload' => 'required',
			'price' => 'required'
			
		]);

		$user = $request ->file('upload');
		$filename = $user->getClientOriginalName();
		$user->move('bisi', $filename);
	

		$user = new Hostel(); 
		$user->name = $request->name;
		$user->location = $request->location;
		$user->description = $request->description;
		$user->price = $request->price;
		$user->upload =$filename;
		$user->save();

		Session::flash('flash_message', 'Hostel successfully added!');
		return redirect('admin/upload');
	}

	public function addHostel(){
		return view('admin.hostel');
	}

	
	public function availableHostel ()
	{
		$hostels = Hostel::all();
		return view('admin.upload', compact('hostels'));	
	}

	public function students()
	{
		$users = User::all();
		return view('admin.views', compact('users'));
	}

	public function allocation()
	{
		$bookings = Booking::all();
		return view('admin.allocation', compact('bookings'));
	}

	public function edit($id)
	{

		$hostel = Hostel::find($id);
		return view('admin.edit', ['hostel' => $hostel]);
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name'=> 'required|min:5|string',
			'location' => 'required|string',
			'description' => 'required|min:10|string',
			'upload' => 'required',
			'price' => 'required'	
		]);

		$hostel = $request ->file('upload');
		$filename = $hostel->getClientOriginalName();
		$hostel->move('bisi', $filename);

		$hostel = Hostel::find($id);
		$hostel->name = $request->name;
		$hostel->location = $request->location;
		$hostel->price = $request->price;
		$hostel->description = $request->description;
		$hostel->upload =$filename;
		$hostel->save();

		Session::flash('flash_message', 'Hostel successfully updated!');
		return redirect('admin/upload');

	}

	public function destroy($id)
	{

		$hostel = Hostel::destroy($id);

		Session::flash('flash_message', 'Hostel deleted!');
		return redirect('admin/upload');
	}

	public function getHostel()
	{
		$hostel = Hostel::all();
		return response()->json(['hostel'=>$hostel], 200);
	}

	public function getStudent()
	{
		$booking = Booking::all();
		return response()->json(['booking'=>$booking], 200);
	}
}

