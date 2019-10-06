<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use File;
use App\Account;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        
        $users = Account::get_all_user();
        return view('home', compact('users'));
    }

    public function get_my_profile() {

        $profile = Account::get_my_profile();
        return view('myprofile', compact('profile'));
    }

    public function profile_image_upload(Request $request) {
        
        $this->validate($request, [
           'image' => 'required|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        $image = $request->file('image');
        $image_new = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("profile"), $image_new);
        $profile = DB::table('users')->where('id', Auth::user()->id)->first();
        $destinationPath = public_path()."/profile/".$profile->photo;
        File::delete($destinationPath);
        DB::table('users')->where('id', Auth::user()->id)->update(['photo' => $image_new]);
        return back()->with('success', 'Image Uploaded Sucessfully')->with('path', $image_new);
    }
    
    public function update_my_profile(Request $request) {

         $user  = DB::table('users')->where('id', Auth::user()->id)->first();
         $data = array();
         if($user->name != $request->name){
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
             ]);
         }
         if($user->email != $request->email){
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             ]);
         }
         if($user->phone != $request->phone){
            $this->validate($request, [
                'phone' => ['required', 'string', 'min:11', 'unique:users'],
             ]);
         }
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         DB::table('users')->where('id', Auth::user()->id)->update($data);
         return Redirect()->back();

    }

    public function get_user_profile($id) {

        $profile = Account::get_user_profile($id);
        return view('userprofile', compact('profile'));
    }

    public function add_connection($id) {

        Account::add_connection($id);
        return Redirect()->back();
    }
}
