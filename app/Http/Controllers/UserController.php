<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

       // return $email ." ". $password;
       if (Auth::attempt(['email' => $email, 'password' => $password])) {
        // Authentication passed...
        return redirect()->intended('dashboard');
    } else {
        return 'username password salah';
    }
    }
    function logout(Request $request){
        auth::logout();
    }

    function test(){
        $data = User::get();
        return $data;
    }
    function register(Request $request) {
     //  dd($request);
        $email = $request->email;
        $name = $request->name;
        $password = $request->password;
        $password_confirm = $request->password_confirm;
        if($email== null){
            return 'email kosong';
        }
        //cek 
        $data = User::where('email',$email)->first();
        if($data != null){
            return 'email sudah ada';
        }
        //ngecek nama

        if($name == null){
            return 'nama kosong';
        }
        //ngecek nama di db
        $data = User::where('name',$name)->first();
        if($data !=null){
            return 'nama sudah ada';
        }
        //ngecek pass
        
        if($password == null){
            return 'password kosong';
        }
        $data = User::where('password',$name)->first();
        if($data !=null){
            return 'password sudah ada';
        }
     
             //ngecek pass == confirm
        if($password != $password_confirm){
            return 'salah';
            return redirect('register');
        }
        

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        $id = $user->id;
        Auth::loginUsingId($id);

        return redirect()->intended('login');
    }
}
