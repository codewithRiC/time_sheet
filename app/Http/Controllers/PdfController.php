<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Project;
use App\Models\Department;
use App\Models\Tasks;
use App\Models\AssignTask;
use App\Models\Allocation;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;

class PdfController extends Controller
{
   public function projectreportpdf(Request $req)
   {
      $pid =  $req->PID;
      $start =  $req->StartDate;
      $end =  $req->EndDate;

      $projectname = DB::table('project')->where('PID',$pid)->select('ProjectName')->first();



      $results = DB::table('tasks')
      ->join('allocation', 'tasks.TID', '=', 'allocation.TID')
      ->join('registration', 'allocation.UID', '=', 'registration.id')
      ->where('tasks.PID', $pid)
      ->whereBetween('allocation.date', [$start, $end])
      ->select(
          'tasks.TID as TID',
          'tasks.TaskName',
          'allocation.date',
          'allocation.day',
          'allocation.UID',
          'allocation.hours',
          'registration.name as user_name'
      )
      ->get();

 // return response()->json($results);
        $data = [
            'projectname' => $projectname,
            'tasks' => $results,
            'start' => $start,
            'end' => $end
        ];

       $pdf = Pdf::loadView('projectreportpdf', $data);
        return $pdf->download('ProjectReport.pdf');
   }

   public function employeereportpdf(Request $req)
   {

    if(session()->get('designation')=='ADMIN'){
          
        $uid =  $req->UID;
    }
    if(session()->get('designation')=='MANAGER'){
    
        $uid =  $req->UID;
 }
 if(session()->get('designation')=='EMPLOYEE'){
    $uid = session()->get('id');
 }
     
      $start =  $req->StartDate;
      $end =  $req->EndDate;

      $username = DB::table('registration')->where('id',$uid)->select('name')->first();
     
      $userAllocations = Allocation::where('UID', $uid)->get();
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
          'tasks' => $tasks,
          'start' => $start,
          'end' => $end,
          'username' => $username
      ];

   
       $pdf = Pdf::loadView('employeereportpdf', $data);
        return $pdf->download('employeeReport.pdf');
   }

//    public function employeereportownpdf(Request $req)
//    {
//       $pid =  $req->PID;
//       $start =  $req->StartDate;
//       $end =  $req->EndDate;

//       $projectname = DB::table('project')->where('PID',$pid)->select('ProjectName')->first();



//       $results = DB::table('tasks')
//       ->join('allocation', 'tasks.TID', '=', 'allocation.TID')
//       ->join('registration', 'allocation.UID', '=', 'registration.id')
//       ->where('tasks.PID', $pid)
//       ->whereBetween('allocation.date', [$start, $end])
//       ->select(
//           'tasks.TID as TID',
//           'tasks.TaskName',
//           'allocation.date',
//           'allocation.day',
//           'allocation.UID',
//           'allocation.hours',
//           'registration.name as user_name'
//       )
//       ->get();

//  // return response()->json($results);
//         $data = [
//             'projectname' => $projectname,
//             'tasks' => $results,
//             'start' => $start,
//             'end' => $end
//         ];

//        $pdf = Pdf::loadView('employeereportownpdf', $data);
//         return $pdf->download('EmployeeReportOwn.pdf');
//    }

}
