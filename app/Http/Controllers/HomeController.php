<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;

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
        return view('welcome',compact('users'));
    }


    public function view(Request $request) 
    {       
        // $request->validate([
        //     'userid' => 'required',
        // ]);
        
        if($request->has('userid'))
        {   
            $id   = $request->userid;
            $user = User::findOrFail($id);
            if($user->id == $request->userid)
            {
                $id=$request->userid;
                return redirect(route('edituser',[$id]));
            }
            return redirect()->with('danger','No User Associated with that value ');
                
        }
        return view('view');   
    }

    public function viewUser($id) 
    {   
        $user = User::findOrFail($id);
        return view('edituser',compact('user'));   
    }

    public function updateUser(UpdateUser $request, $id) 
    {   
            $user =  User::findOrFail($id);
    
            $user->first_name  = $request->first_name;
            $user->last_name   = $request->last_name;
            $user->email       = $request->email;
            $user->password    = Hash::make($request->password);
            $user->notes       = $request->notes;
            $user->save();

        return redirect()->back()->with('success','User has been updated successfully.');
     }

     public function deleteUser(Request $request, $id) 
    {       
        
        $request->validate([
            'userid' => 'required',
        ]);
         
        
        if($id == $request->userid)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/');
        }
        return redirect()->back()->with('danger','User cannot be deleted, ID is not the same');
                
        
    }
}