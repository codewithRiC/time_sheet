<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Registration;

class UserController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function about(){
        return view('about');
    }

    public function forgetpassword(){
        return view('forgetpassword');
    }

    public function resetpassword(){
        return view('resetpassword');
    }

    public function admindashboard(){
        return view('admin.dashboard');
    }
    public function managerdashboard(){
        return view('manager.dashboard');
    }
    public function employeedashboard(){
        return view('employee.dashboard');
    }

    public function profileview($id){
        $user = Registration::find($id);
        $data=compact('user');
        return view('profileview')->with($data);

    }

    public function profile($id){
        $user = Registration::find($id);
        $data=compact('user');
        return view('profileupdate')->with($data);

    }

    public function profileupdate($id, Request $req){
        $data = Registration::find($id);

        $req->validate(
            [
               
                'image'=>'nullable|mimes:png,jpg,jpeg'
            ]
    
        );

        if($req->has('image')){
            $file=$req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $data->name.'.'.$extension;
            $path= 'uploads/profile/';
            $file->move($path,$filename);
        }

   
        $data->name=$req['name'];
        $data->email=$req['email'];
        $data->address=$req['address'];
        $data->pin=$req['pin'];
        $data->phone=$req['phone'];
        $data->state=$req['state'];
        $data->qualification=$req['qualification'];
        $data->designation=$req['designation'];
        $data->yoe=$req['yoe'];
        $data->details=$req['details'];
        $data->image=$path.$filename;
        $data->save();

        if($data->designation=='ADMIN'){
          
            return redirect('admindashboard');
        }
        if($data->designation=='MANAGER'){
        
         return redirect('managerdashboard');
     }
     if($data->designation=='EMPLOYEE'){
 
         return redirect('employeedashboard');
     }
       
    }

    public function createemployee(){
        return view('createemployee');
    }

    public function createmanager(){
        return view('createmanager');
    }

    public function createdepartment(){
        $users= Registration::where('designation','EMPLOYEE')->get();
        $data=compact('users');
        return view('createdepartment')->with($data);
    }

    public function employeeupdate(){
        $user = Registration::where('designation', 'EMPLOYEE')->get();
        $data=compact('user');
        
        return view('employeeupdate')->with($data);
    }

    public function managerupdate(){
        $user = Registration::where('designation', 'MANAGER')->get();
        $data=compact('user');
        return view('managerupdate')->with($data);
    }

    
    public function delete($id){
        Registration::find($id)->delete();
        return redirect()->back();

    }

  
    public function viewemployee($id){
        $user = Registration::find($id);
        $data=compact('user');
        return view('viewemployee')->with($data);
    

    }

    public function viewmanager($id){
        $user = Registration::find($id);
        $data=compact('user');
        return view('viewmanager')->with($data);
    

    }





    public function departmentupdate(){
        return view('departmentupdate');
    }

    public function createplan(){
        return view('createplan');
    }

    public function planupdate(){
        return view('planupdate');
    }

    
    public function createproject(){
        return view('createproject');
    }

    
    public function createtasks(){
        return view('createtasks');
    }

    
    public function projectupdate(){
        return view('projectupdate');
    }

    
    public function tasksupdate(){
        return view('tasksupdate');
    }

    public function assigntasks(){
        return view('assigntasks');
    }
    
    public function assigntasksview(){
        return view('assigntasksview');
    }

    public function addtimeslot(){
        return view('addtimeslot');
    }

    public function projectreport(){
        return view('projectreport');
    }

    public function employeereport(){
        return view('employeereport');
    }



}



