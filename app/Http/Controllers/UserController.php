<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    public function registerView()
    {

        return view('frontend.register');


    }


    public function registerProcess(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|min:8|max:12|unique:users,mobile_number',
            'password' => 'required|min:4|confirmed',
        ]);

        $data = [

            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => strtolower($request->input('email')),
            'mobile_number' => $request->input('mobile_number'),
            'password' => bcrypt($request->input('password')),

        ];

        try{

            User::create($data);
            $this->setSuccessMessage('Registration Successfully Done');

            return redirect()->route('login');

        }
        catch (Exception $e){
            $this->setErrorMessage($e->getMessage());

            return redirect()->back();
        }

//        User::create($data);

    }

    public function showLogin(){

        return view('frontend.login');

    }

    public function processLogin(Request $request){

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

       $credential=$request->except('_token');

       if(auth()->attempt( $credential)){
           return view('dashboard');

       }

       return redirect()->back();

    }

    public function logout(){

        auth()->logout();


        $this->setSuccessMessage('Profile is Log Out');
        return redirect()->route('login');

    }




}



