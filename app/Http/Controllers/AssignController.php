<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Registration;

class AssignController extends Controller
{
    public function assign(Request $request)
    {
        // Validate incoming request data
    //     $validatedData = $request->validate([
    //         'Code' => 'required|string',
    //         'DepartmentName' => 'required|string',
    //         'Description' => 'nullable|string',
    //         'DepartmentHead' => 'nullable|string',
    //         'team_members' => 'nullable|array',
    //     ],
    //     [
    //         'Code.required' => 'The Code is required.',
    //         'DepartmentName.required' => 'The Department name is required.'
    //         ]
    // );

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

}
