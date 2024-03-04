<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function register(Request $req)
    {
        //validation
    $req->validate(
        [
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required',
            'confirmpassword'=>'required|same:password',
            'phone'=>'required|digits:10',
            'designation'=>'required',
            'securityAnswer'=>'required'
        ]

    );

    //insert query
    $data =new Registration;
   
    $data->name=$req['name'];
    $data->email=$req['email'];
    $data->password=$req['password'];
    $data->confirmpassword=md5($req['confirmpassword']);
    $data->phone=$req['phone'];
    $data->designation=$req['designation'];
    $data->securityQuestion=$req['securityQuestion'];
    $data->securityAnswer=$req['securityAnswer'];
    $data->save();


   

        
      
    return redirect('login')->with('success','Successfully Registered');
        
    }

    public function login(Request $req)
    {
        //validation
    $req->validate(
        [
            
            'email'=>'required|email',
            'password'=>'required',
            'designation'=>'required'
           
        ]

    );

    // $pass=md5($req->input('password'));
    //insert query
    $user=Registration::where('email',$req->input('email'))->where('designation',$req->input('designation'))->where('password',$req->password)->first();



   if($user){

        session()->put('id',$user->id);
        session()->put('designation',$user->designation);
        session()->put('name',$user->name);
       if($user->designation=='ADMIN'){
          
           return redirect('admindashboard')->with($user->name);
       }
       if($user->designation=='MANAGER'){
       
        return redirect('managerdashboard')->with($user->name);
    }
    if($user->designation=='EMPLOYEE'){

        return redirect('employeedashboard')->with($user->name);
    }

   }
   else{
     return redirect('login')->with('error','Wrong Email/ Password');
   }

        
      
   
        
    }
}
