<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Project;
use App\Models\Department;
use App\Models\Tasks;
use App\Models\AssignTask;
use App\Models\Allocation;

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
        if($req->has('image')){
        $data->image=$path.$filename;
        }
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
        $user = Department::all();
        $data=compact('user');
        
      
        return view('departmentupdate')->with($data);
    }

    public function createplan(){
        return view('createplan');
    }

    public function planupdate(){
        return view('planupdate');
    }

    public function createproject(){
        $users= Registration::where('designation','MANAGER')->get();
        $data=compact('users');
    
        return view('createproject')->with($data);

    }

    
   
    
    public function createtasks(){
        $users= Project::all();
        $data=compact('users');
    
        return view('createtasks')->with($data);
       
    }

    
    public function projectupdate(){
        $user = Project::all();
        $data=compact('user');
        
        
        return view('projectupdate')->with($data);
    }

    
    public function tasksupdate(){
        $user = Tasks::all();
        $data=compact('user');
        
      
        return view('tasksupdate')->with($data);
    }

    public function assigntasks(){

        $userIds = Registration::all()->pluck('id')->toArray();
        $userIds = array_map(function($id) {
            return sprintf("%s", $id);

        }, $userIds);
        
        // Now $userIds contains user IDs with each value wrapped in double quotes
        
        // dd($userIds);
       
        // $userIds = ["1","2","5","6","7","8","9","10","11","12","14","17"];

        // Initialize an array to store the task counts for each user
        $userTaskCounts = [];
        
        // Loop through each user ID (UID) to count tasks for each user
        foreach ($userIds as $userId) {
           
            // print_r($userId);
        
            // Check if the user ID exists in the team_members array
            if (AssignTask::whereJsonContains('team_members', $userId)->exists()) {
                // Find TIDs for the current user by comparing $userId with the IDs present in the team_members array
                $tids = AssignTask::whereJsonContains('team_members', $userId)->pluck('TID');
                $taskCount = Tasks::whereIn('TID', $tids)->count();
                // print_r($tids);

            } else {
                // If user ID doesn't exist in team_members, set task count to 0
                $taskCount = 0;
                
            }
  
            // Store the task count for the current user in the array
            $userTaskCounts[$userId] = $taskCount;
            // print_r($taskCount);
        }
        
// exit;

        $users= Registration::where('designation','EMPLOYEE')->get();
        $task= Tasks::all();
        $data=compact('users','task','userTaskCounts');

        return view('assigntasks')->with($data);
    }
    
    public function assigntasksview($id){
      
        $tids = AssignTask::whereJsonContains('team_members', $id)->pluck('TID');

        $user = Tasks::whereIn('TID', $tids)->get();
        
        $data=compact('user');
        return view('assigntasksview')->with($data);
    }

    public function viewtimeslot($id){

    //     $user = Allocation::where('UID', $id)->get();
        
       
    //     $task = Tasks::find($user->TID);
    //     $data=compact('user','task');
    //    return view('viewtimeslot')->with($data);

    $userAllocations = Allocation::where('UID', $id)->get();
$tasks = [];

foreach ($userAllocations as $allocation) {
    if ($allocation->TID == 0) {
        $tasks[] = 'Others';
    } else {
        $task = Tasks::find($allocation->TID);
        if ($task) {
            $tasks[] = $task->TaskName; // Fetching just the task name
        }
    }
}

$data = [
    'user' => $userAllocations,
    'tasks' => $tasks
];

return view('viewtimeslot', $data);

    }

    public function addtimeslot($id){
        $tids = AssignTask::whereJsonContains('team_members', $id)->pluck('TID');

        $task = Tasks::whereIn('TID', $tids)->get();
        
        $data=compact('task','id');

        return view('addtimeslot')->with($data);
    }

    public function projectreport(){
        return view('projectreport');
    }

    public function employeereport(){
        return view('employeereport');
    }

  

}



