<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function index(){
		$data = User::all();
		$nama = Auth::user()->name;
		$picture = 'storage/images/'.Auth::user()->picture;
		$jam = date('H:i');
		if ($jam > '04:00' && $jam <= "10:00") {
			$feel = "Pagi";
		}else if ($jam > '10:00' && $jam <= "14:00"){
			$feel = "Siang";
		}else if($jam > "14:00" && $jam <= "16:30"){
			$feel = "Sore";
		}else if($jam > "16:30" && $jam <= "18:30"){
			$feel = "Petang";
		}else{
			$feel = "Malam";
		}
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Sistem Admin <span class="glyphicon glyphicon-menu-right"></span> User';
		return view('user.user', compact('feel', 'nama', 'picture', 'data', 'tree'));
	}

	function profile(){
		$picture = 'storage/images/'.Auth::user()->picture;
		$user = Auth::user();
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Sistem Admin <span class="glyphicon glyphicon-menu-right"></span> User <span class="glyphicon glyphicon-menu-right"></span> Profile';
		return view('user.profile', compact('user', 'picture', 'tree'));
	}

	function update_profile(Request $request){
		// dd($request->photo->getClientOriginalName());
		Validator::make($request->all(), [
			'photo' => 'image|max:1000000',
			]);

		if ($request->photo->isValid()) {
			$name = date('ymd-h-i-s.');
			$extension = $request->photo->extension();
			$photo = $name.$extension;
			$store = $request->photo->storeAs('public/images', $photo);
			if ($store) {
				$id = Auth::user()->id;
				User::find($id)->update([
					'picture' => $photo,
					'name' => $request->name,
					'email' => $request->email,
					]);
				return redirect ('user');
			}
		}
	}

	function password(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Sistem Admin <span class="glyphicon glyphicon-menu-right"></span> Password';
		return view('user.password', compact('tree'));
	}
	function change_password(Request $request){
		Validator::make($request->all() , [
			'new_password' => 'required|min:6|confirmed',
			'oldpass' => 'required|min:6',
			])->validate();
		$id = Auth::user()->id;
		$oldpass = Auth::user()->password;
		if (Hash::check($request->oldpass, $oldpass)) {
			User::find($id)->update([
				'password' => Hash::make($request->new_password)
				]);
		}
		return redirect ('user');
	}

	function create(){
		$tree = '<span class="glyphicon glyphicon-menu-right"></span> Sistem Admin <span class="glyphicon glyphicon-menu-right"></span> User <span class="glyphicon glyphicon-menu-right"></span> Tambah User';
		return view('user.create', compact('tree'));
	}

	function store(Request $request){
		Validator::make($request->all() , [
			'username' => 'required',
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
			])->validate();

		User::create([
			'username' => $request->username,
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			]);
		return redirect ('user');
	}

	function logout(){
		Auth::logout();
		return redirect ('');	
	}
}
