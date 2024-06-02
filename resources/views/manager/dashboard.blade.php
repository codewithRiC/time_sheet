@push('title')
    <title>Manager</title>
@endpush  

@include('layouts.managerheader')


  
    


   

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                @php
                     
                @endphp
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Employees : {{ $employee }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('employeeupdate') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Department : {{ $department }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('managerupdate') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Task : {{ $t }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('tasksupdate') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Project : {{ $project  }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{ route('projectupdate') }}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                DAY WISE - HOUR
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                TASK WISE - HOUR
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Employee time slot 
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
                                @foreach ($userAllocations as $index => $u)
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

$allocations = DB::table('allocation as a')
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

$dates = [];
$totalHoursPerDay = [];
$totalHoursPerTask = [];
$taskNames = [];

foreach ($allocations as $allocation) {
    $dates[] = $allocation->date;
    $totalHoursPerDay[$allocation->date] = ($totalHoursPerDay[$allocation->date] ?? 0) + $allocation->total_hours;
    $totalHoursPerTask[$allocation->TaskName] = ($totalHoursPerTask[$allocation->TaskName] ?? 0) + $allocation->total_hours;
    $taskNames[$allocation->TaskName] = $allocation->TaskName;
}

$dates = array_values(array_unique($dates));
$taskNames = array_values(array_unique($taskNames));
$sumHoursPerDay = array_values($totalHoursPerDay);
$sumHoursPerTask = array_values($totalHoursPerTask);
@endphp

<script>
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [{
                label: "Hours",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: @json($sumHoursPerDay),
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
                        max: 80,
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

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($taskNames),
            datasets: [{
                label: "Hours",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: @json($sumHoursPerTask),
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
                        max: 100,
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