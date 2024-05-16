<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Registration;
use App\Models\AssignTask;
use App\Models\Allocation;

class AllocationController extends Controller
{
    public function allocation(Request $request)
    {
        $validatedData = $request->validate([
            'UID' => 'required', // Check if UID exists in the users table
            'date' => 'required',
            'day' => 'required',
            'TID' => 'nullable|array', // Ensure TID is an array
            'hours' => 'nullable|array', // Ensure hours is an array
            'remarks' => 'nullable|string',
        ]);
    
        // Check if an allocation already exists for the same user and date combination
        $existingAllocation = Allocation::where('UID', $validatedData['UID'])
                                        ->where('date', $validatedData['date'])
                                        ->exists();
        if ($existingAllocation) {
            return redirect()->back()->withErrors(['date' => 'Time slot already allocated for this date.']);
        }
    
        // Loop through each time slot and save allocation
        foreach ($validatedData['TID'] as $key => $TID) {
            $allocation = new Allocation();
            $allocation->UID = $validatedData['UID'];
            $allocation->date = $validatedData['date'];
            $allocation->day = $validatedData['day'];
            $allocation->TID = $TID; 
            $allocation->hours = $validatedData['hours'][$key];
            $allocation->remarks = $validatedData['remarks'];
            $allocation->save();
        }
    
        return redirect()->back();
    }
    
    

    
}
