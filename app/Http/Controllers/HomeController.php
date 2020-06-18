<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUser;
use App\User;
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
    public function index()
    {   
        return view('home');
    }

    public function saveuser(CreateUser $request)
    {       
            $user              = new User;
            $user->first_name  = $request->first_name;
            $user->last_name   = $request->last_name;
            $user->email       = $request->email;
            $user->password    = Hash::make($request->password);
            $user->notes       = $request->notes;
            $user->save();

         return redirect()->back()->with('success','User has been made successfully');
    }

    

    public function showuser()
    {   
        $users = User::paginate(3);
        return view('welcome',compact('users'));;
    }
}