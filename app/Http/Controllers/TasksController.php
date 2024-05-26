<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Registration;
use App\Models\Project;
use App\Models\AssignTask;

class TasksController extends Controller
{
    public function createtasks(Request $req){
       
        $req->validate([
            'TaskName'=> 'required',
            'TaskDescription'=>'required',
            
            'TStartDate'=>'required|date',
            'TEndDate'=>'required|date|after_or_equal:PStartDate',
            'Status'=>'required',
            'PID'=>'required',
            'Priority'=>'required'
        ], [
            'TaskName.required' => 'The Task name is required.',
            'TaskDescription.required' => 'The Task description is required.',
           
            'TStartDate.required' => 'The Tasks start date is required.',
            'TStartDate.date' => 'The Task start date must be a valid date.',
            'TEndDate.required' => 'The task end date is required.',
            'TEndDate.date' => 'The task end date must be a valid date.',
            'TEndDate.after_or_equal' => 'The task end date must be after or equal to the start date.',
            'Status.required' => 'The status is required.',
            'Priority.required' => 'The priority is required.',
            'PID.required'=>'The Project need to be assigned.'
        ]);

        $project = Project::find($req->PID);

        if ($req->TStartDate < $project->PStartDate) {
            return back()->withErrors(['TStartDate' => 'Start Date must not be less than Project Start Date.'])->withInput();
        }
    
        if ($req->TEndDate > $project->PEndDate) {
            return back()->withErrors(['TEndDate' => 'End Date must not be more than Project End Date.'])->withInput();
        }
    
        
    
        //insert query
        $d =new Tasks;
       
        $d->TaskName=$req['TaskName'];
        $d->TaskDescription=$req['TaskDescription'];
        $d->TStartDate=$req['TStartDate'];
       
        $d->TEndDate=$req['TEndDate'];
        $d->PID=$req['PID'];
        $d->Priority=$req['Priority'];
        $d->Status=$req['Status'];
        $d->Progress=$req['Progress'];
        $d->Dependencies=$req['Dependencies'];
        $d->EmployeeNote=$req['EmployeeNote'];
        $d->ManagerNote=$req['ManagerNote'];
        $d->save();

        return redirect('createtasks')->with('success','Successfully Project Created');

    }  
    
    
    public function delete($id){
        Tasks::find($id)->delete();
        return redirect()->back();

    }


    public function task($id){
        

        // Assuming you have the $departmentId variable containing the ID provided by the user
       
        


        $user = Tasks::find($id);
        $users = Project::where('PID', $user->PID)->get();
        $data=compact('user','users');
        return view('viewtasks')->with($data);

    }

    
    public function task2($id){
        $new=Project::all();
       
         $user = Tasks::find($id);
         $users = Project::where('PID', $user->PID)->get();
        $data=compact('user','users','new');
        return view('edittasks')->with($data);

    }

    public function edittasks($id, Request $req){
        $req->validate([
            'TaskName'=> 'required',
            'TaskDescription'=>'required',
            
            'TStartDate'=>'required|date',
            'TEndDate'=>'required|date|after_or_equal:PStartDate',
            'Status'=>'required',
            'PID'=>'required',
            'Priority'=>'required'
        ], [
            'TaskName.required' => 'The Task name is required.',
            'TaskDescription.required' => 'The Task description is required.',
           
            'TStartDate.required' => 'The Tasks start date is required.',
            'TStartDate.date' => 'The Task start date must be a valid date.',
            'TEndDate.required' => 'The task end date is required.',
            'TEndDate.date' => 'The task end date must be a valid date.',
            'TEndDate.after_or_equal' => 'The task end date must be after or equal to the start date.',
            'Status.required' => 'The status is required.',
            'Priority.required' => 'The priority is required.',
            'PID.required'=>'The Project need to be assigned.'
        ]);
        
    
        

        $d = Tasks::find($id);
        $d->TaskName=$req['TaskName'];
        $d->TaskDescription=$req['TaskDescription'];
        $d->TStartDate=$req['TStartDate'];
       
        $d->TEndDate=$req['TEndDate'];
        $d->PID=$req['PID'];
        $d->Priority=$req['Priority'];
        $d->Status=$req['Status'];
        $d->Progress=$req['Progress'];
        $d->Dependencies=$req['Dependencies'];
        $d->EmployeeNote=$req['EmployeeNote'];
        $d->ManagerNote=$req['ManagerNote'];
        $d->save();

       

 
  
        return redirect()->back();

       
    }
}
