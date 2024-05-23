
@push('title')
<title>Employee</title>
@endpush 

@include('layouts.employeeheader')
   
 
  

   

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                {{-- <div class="row">
                    <div class="col-xl-3 col-md-12">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xl-3 col-md-8">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Warning Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-8">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div> --}}
                    
                {{-- </div> --}}
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Date V/s Hours
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Task V/s Hours
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Time Slot Table
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Tasks</th>
                                    <th>Time Spent</th>
                                   
                                   
        
                                </tr>
                            </thead>
                            <tbody>
                                
                          
                                @php
                                    $sno = 1;
                                @endphp
                                @foreach ($user as $index => $u)
                                    <tr>
                                        <td>{{ $sno++ }}</td>
                                        <td>{{ $u->date }}</td>
                                        <td>{{ $u->day }}</td>
                                        <td>{{ isset($tasks[$index]) ? $tasks[$index] : '' }}</td> <!-- Access task from $tasks array -->
                                        <td>{{ $u->hours }}</td>
                                    </tr>
                                @endforeach
                              
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </main>
       
    </div>
</div>


@include('layouts.footer')
@php
  
   

$currentDate = \Carbon\Carbon::now();


    $endDate = $currentDate->format('Y-m-d');
    $startDate = $currentDate->subDays(7)->format('Y-m-d');

    $allocations = DB::table('allocation as a')->where('a.UID' , session()->get('id'))
        ->join('tasks as t', 'a.TID', '=', 't.TID')
        ->select(
            DB::raw('DATE(a.date) as date'),
            DB::raw('SUM(a.hours) as total_hours'),
            't.TaskName'
        )
        ->whereBetween('a.date', [$startDate, $endDate])
        ->groupBy(DB::raw('DATE(a.date)'), 't.TaskName')
        ->orderBy('date', 'asc')
        ->get();

    // print_r($allocations['date']);
    $d=[];
    $t=[];
    $tname = [];
    foreach ($allocations as $alt){
        $d[]=  $alt->date;
        $t[] =   $alt->total_hours;
        $tname[] = $alt->TaskName;
    }

  
  
  
@endphp
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: @json($d),
    datasets: [{
      label: "Hours",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
    //   pointHoverRadius: 5,
    //   pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: @json($t),
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 12,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: @json($tname),
    datasets: [{
      label: "Hours",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: @json($t),
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 12,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});


</script>