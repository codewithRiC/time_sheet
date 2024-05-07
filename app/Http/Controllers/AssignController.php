<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Registration;
use App\Models\AssignTask;

class AssignController extends Controller
{
    public function assigntasks(Request $request)
    {
     
        $validatedData = $request->validate([
            'team_members' => 'nullable|array',
            'TID' => 'required|string',
            'StartDate' => 'required|date',
            'Remark' => 'nullable|string',
           
        ],
        [
      
            'StartDate.required' => 'The Start Date is required.',
            'TID.required' => 'The TID is required.'
            ]
    );
       
        // Create a new department instance
        $d = new AssignTask();
        $d->team_members = $validatedData['team_members'];
        $d->TID = $validatedData['TID'];
        $d->StartDate = $validatedData['StartDate'];
        $d->Remark = $validatedData['Remark'];
       


        // Save the department to the database
        $d->save();

        // Attach team members to the department
        if (isset($validatedData['team_members'])) {
            foreach ($validatedData['team_members'] as $userId) {
                $user = Registration::find($userId);
                if ($user) {
                    $user->TID = $d->id;
                    $user->save();
                }
            }
        }




        // Redirect or return a response as needed
        // For example, you might redirect back to a page after successful creation
        return redirect()->back()->with('success', 'Department created successfully.');
    }

}
