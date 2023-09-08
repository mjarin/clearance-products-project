<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function LoginPage(){
        return view('Backend.login');
    }

    public function adminLogin(Request $request){

        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'role' => 'required'
            
        ]);

        $user =User::where('email','=',$request->email)->where('role_as','=',$request->role)->first();

        if(!$user){

            return back()->with('status', 'Email is not recogmized ');

        }else{

            if(Hash::check($request->password,$user->password))
            {

                $request->session()->put('adminLoggedId',$user->id);
                return redirect('/admin-dashboard');
                    
                
            }
            else
            {
                return back()->with('status','Incorrect Password');
            }
        }// end of else..............


// end of function..............
    }


    public function adminLogout(){

        if(Session::has('adminLoggedId')){
            Session::pull('adminLoggedId'); 
            return redirect('admin/login');
          }

    }


// end of Controller Class.........................
}


