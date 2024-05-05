<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Registration;

class DepartmentController extends Controller
{
    public function createdepartment(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'Code' => 'required|string',
            'DepartmentName' => 'required|string',
            'Description' => 'nullable|string',
            'DepartmentHead' => 'nullable|string',
            'team_members' => 'nullable|array',
        ],
        [
            'Code.required' => 'The Code is required.',
            'DepartmentName.required' => 'The Department name is required.'
            ]
    );
        print_r($validatedData['team_members']);
        exit;
        // Create a new department instance
        $department = new Department();
        $department->Code = $validatedData['Code'];
        $department->DepartmentName = $validatedData['DepartmentName'];
        $department->Description = $validatedData['Description'];
        $department->DepartmentHead = $validatedData['DepartmentHead'];
        $department->team_members = $validatedData['team_members'];


        // Save the department to the database
        $department->save();

        // Attach team members to the department
        if (isset($validatedData['team_members'])) {
            foreach ($validatedData['team_members'] as $userId) {
                $user = Registration::find($userId);
                if ($user) {
                    $user->DID = $department->DID;
                    $user->save();
                }
            }
        }


        // Redirect or return a response as needed
        // For example, you might redirect back to a page after successful creation
        return redirect()->back()->with('success', 'Department created successfully.');
    }


    public function delete($id){
        Department::find($id)->delete();
        return redirect()->back();

    }


    public function department($id){
        

        // Assuming you have the $departmentId variable containing the ID provided by the user
        $users = Registration::where('DID', $id)->get();
        


        $user = Department::find($id);
        $data=compact('user','users');
        return view('viewdepartment')->with($data);

    }

    
    public function department2($id){
        $new=Registration::all();
        $users = Registration::where('DID', $id)->get();
         $user = Department::find($id);
        $data=compact('user','users','new');
        return view('editdepartment')->with($data);

    }

    public function editdepartment($id, Request $request){
        $validatedData = $request->validate([
            'Code' => 'required|string',
            'DepartmentName' => 'required|string',
            'Description' => 'nullable|string',
            'DepartmentHead' => 'nullable|string',
            'team_members' => 'nullable|array',
        ],
        [
            'Code.required' => 'The Code is required.',
            'DepartmentName.required' => 'The Department name is required.'
            ]
    );

    
        

        $d = Department::find($id);

        $d->Code = $validatedData['Code'];
        $d->DepartmentName = $validatedData['DepartmentName'];
        $d->Description = $validatedData['Description'];
        $d->DepartmentHead = $validatedData['DepartmentHead'];
        $d->team_members = $validatedData['team_members'];


        // Save the department to the database
        $d->save();

        // Attach team members to the department
        if (isset($validatedData['team_members'])) {
            foreach ($validatedData['team_members'] as $userId) {
                $user = Registration::find($userId);
                if ($user) {
                    $user->DID = $d->DID;
                    $user->save();
                }
            }
        }

        return redirect('departmentupdate');

       
    }
}
