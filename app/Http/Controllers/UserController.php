<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function profileview(){
        return view('profileview');
    }

    public function profileupdate(){
        return view('profileupdate');
    }

    public function createemployee(){
        return view('createemployee');
    }

    public function createmanager(){
        return view('createmanager');
    }

    public function createdepartment(){
        return view('createdepartment');
    }

    public function employeeupdate(){
        return view('employeeupdate');
    }

    public function managerupdate(){
        return view('managerupdate');
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


