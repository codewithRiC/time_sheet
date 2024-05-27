@push('title')
    <title>View assign tasks</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tasks Details
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
        
                        <tr>
                            <th>Sl No.</th>
                            <th>Task ID</th>
                            <th>Name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Remaining days</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Manager Note</th>
                            <th>Employee Note</th>
                            <th>Suggestion</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        


                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($user as $u)
                        @php
                        $startDate = \Carbon\Carbon::parse($u->TStartDate);
                        $endDate = \Carbon\Carbon::parse($u->TEndDate);
                        $numberOfDays = $endDate->diffInDays($startDate);
                        
                        $today = \Carbon\Carbon::now();
                        $remainingDays = $today->diffInDays($endDate);
                        
                        $progressRatio = ($numberOfDays - $remainingDays) / $numberOfDays * 100;
                        @endphp
                       
                        @php
                            $sno = 1;

                            // Assume $start_date and $end_date are available in the current scope

                        @endphp

                            <tr>
                                <td>{{ $sno++ }}</td>
                                <td>{{ 'TID-' }}-{{ $u->TID }}</td>
                                <td>{{ $u->TaskName }}</td>
                               
                                <td>{{ date_format(date_create($u->TStartDate), 'd-M-Y') }}</td>
                                <td>{{ date_format(date_create($u->TEndDate), 'd-M-Y') }}</td>

                                {{-- @php
                                     $startDate = \Carbon\Carbon::now();
                                    $endDate = \Carbon\Carbon::parse($u->PEndDate);

                                    $numberOfDays = $endDate->diffInDays($startDate);

                                @endphp --}}
                                <td>{{ $remainingDays }}</td>
                                <td>{{ $u->Status }}</td>

                                <td><span  style="color: 
                                    @if ($u->Priority == 'HIGH') red !important;
                                    @elseif ($u->Priority == 'LOW')
                                        green !important;
                                    @elseif ($u->Priority == 'MEDIUM')
                                        blue !important;
                                    @else
                                        black; /* Or any default color */ @endif ">{{ $u->Priority }}</span></td>



                               
                                <td>{{ $u->ManagerNote }}</td>
                                <td>{{ $u->EmployeeNote }}</td>
                                <td> @if (($u->Status == 'Not Started' || $u->Status == 'In Progress') && ($progressRatio >= 0 && $progressRatio < 40))
                                        <span style="background-color:  rgb(55, 105, 232); color:white;">Need to focus</span>
                                   
                                @elseif (($u->Status == '50% Completed' || $u->Status == 'Not Started' || $u->Status == 'In Progress') && ($progressRatio >= 40 && $progressRatio < 75))
                                        <span style="background-color: rgb(102, 12, 12); color:white;">High alert, take some steps</span>
                                    
                                @elseif (($u->Status == '75% Completed' || $u->Status == 'Not Started' || $u->Status == 'In Progress') && ($progressRatio >= 75 && $progressRatio < 95))
                                        <span style="background-color: rgb(230, 44, 60); color:white;">Focus and try to complete it</span>
                                    
                                @elseif (($u->Status == '90% Completed' || $u->Status == 'Not Started' || $u->Status == 'In Progress') && ($progressRatio >= 95))
                                        <span style="background-color: rgb(247, 70, 85); color:white;">Just a little more effort to complete the project</span>
                                    
                                @endif</td>
                                <td>{{ $u->updated_at }}</td>
                                <td>

                                    <div style="display: flex ">
                                        <a href="{{ route('viewtasks', ['id' => $u->TID]) }}"> <button
                                                class="btn btn-secondary m-1"><i class="fa-solid fa-eye"></i></button></a>
                                         <a href="{{ route('edittasks', ['id' => $u->TID]) }}"> <button
                                                    class="btn btn-primary m-1"><i class="fa-solid fa-pen"></i></button></a>
                                       
                                        </div>        
                                </td>
                               
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </main>

    </div>
    </div>

    @include('layouts.footer')
