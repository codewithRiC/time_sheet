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
            'UID' => 'required',
            'date'=>'required',
            'day'=>'required',
            'TID' => 'nullable',
            'hours'=> 'nullable|min:0',
          
            'remarks' => 'nullable|string',
           
        ]
      
    );

     foreach ($validatedData['TID'] as $key => $TID) {
       
        $d = new Allocation();
        $d->UID = $validatedData['UID'];
        $d->date = $validatedData['date'];
        $d->day = $validatedData['day'];
        $d->TID = $validatedData['TID'][$key]; 
        $d->hours = $validatedData['hours'][$key];
        $d->remarks = $validatedData['remarks'];
        $d->save();

    }
 
        return redirect()->back();
    }

    
}
