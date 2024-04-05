<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Project;


class ProjectController extends Controller
{
    public function createproject(Request $req){
       
        $req->validate([
            'ProjectName'=> 'required',
            'ProjectDescription'=>'required',
            'ProjectManager'=>'required',
            'PStartDate'=>'required|date',
            'PEndDate'=>'required|date|after_or_equal:PStartDate',
            'Status'=>'required',
            'Priority'=>'required'
        ], [
            'ProjectName.required' => 'The project name is required.',
            'ProjectDescription.required' => 'The project description is required.',
            'ProjectManager.required' => 'The project manager is required.',
            'PStartDate.required' => 'The project start date is required.',
            'PStartDate.date' => 'The project start date must be a valid date.',
            'PEndDate.required' => 'The project end date is required.',
            'PEndDate.date' => 'The project end date must be a valid date.',
            'PEndDate.after_or_equal' => 'The project end date must be after or equal to the start date.',
            'Status.required' => 'The status is required.',
            'Priority.required' => 'The priority is required.'
        ]);
        
    
        //insert query
        $d =new Project;
       
        $d->ProjectName=$req['ProjectName'];
        $d->ProjectDescription=$req['ProjectDescription'];
        $d->PStartDate=$req['PStartDate'];
       
        $d->PEndDate=$req['PEndDate'];
        $d->ProjectManager=$req['ProjectManager'];
        $d->Priority=$req['Priority'];
        $d->Status=$req['Status'];
        $d->Tags=$req['Tags'];
        $d->Dependencies=$req['Dependencies'];
        $d->AdminNote=$req['AdminNote'];
        $d->ManagerNote=$req['ManagerNote'];
        $d->save();

        return redirect('createproject')->with('success','Successfully Project Created');
    
    }

        
    public function delete($id){
        Project::find($id)->delete();
        return redirect()->back();

    }


    public function project($id){
        $users= Registration::where('designation','MANAGER')->get();
        
    
       
        $user = Project::find($id);
        $data=compact('user','users');
        return view('viewproject')->with($data);

    }

    
    public function project2($id){
        $users= Registration::where('designation','MANAGER')->get();
        
    
       
        $user = Project::find($id);
        $data=compact('user','users');
        return view('editproject')->with($data);

    }

    public function editproject($id, Request $req){
        $req->validate([
            'ProjectName'=> 'required',
            'ProjectDescription'=>'required',
            'ProjectManager'=>'required',
            'PStartDate'=>'required|date',
            'PEndDate'=>'required|date|after_or_equal:PStartDate',
            'Status'=>'required',
            'Priority'=>'required'
        ], [
            'ProjectName.required' => 'The project name is required.',
            'ProjectDescription.required' => 'The project description is required.',
            'ProjectManager.required' => 'The project manager is required.',
            'PStartDate.required' => 'The project start date is required.',
            'PStartDate.date' => 'The project start date must be a valid date.',
            'PEndDate.required' => 'The project end date is required.',
            'PEndDate.date' => 'The project end date must be a valid date.',
            'PEndDate.after_or_equal' => 'The project end date must be after or equal to the start date.',
            'Status.required' => 'The status is required.',
            'Priority.required' => 'The priority is required.'
        ]);

    
        

        $d = Project::find($id);

        $d->ProjectName=$req['ProjectName'];
        $d->ProjectDescription=$req['ProjectDescription'];
        $d->PStartDate=$req['PStartDate'];
       
        $d->PEndDate=$req['PEndDate'];
        $d->ProjectManager=$req['ProjectManager'];
        $d->Priority=$req['Priority'];
        $d->Status=$req['Status'];
        $d->Tags=$req['Tags'];
        $d->Dependencies=$req['Dependencies'];
        $d->AdminNote=$req['AdminNote'];
        $d->ManagerNote=$req['ManagerNote'];
        $d->save();


        return redirect('projectupdate');

       
    }


   
}
