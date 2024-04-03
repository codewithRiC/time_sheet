@push('title')
    <title>Update Project</title>
@endpush

@if (session()->get('designation') == 'ADMIN')
    @include('layouts.adminheader')
@elseif (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@endif

<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Project Details
            </div>
           
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Manager</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Remaining days</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Admin Note</th>
                            <th>Manager Note</th>
                            <th>Suggestion</th>
                            <th>Updated Date</th>
                            <th>Action</th>


                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($user as $u)
                        @php
                        $startDate = \Carbon\Carbon::parse($u->PStartDate);
                        $endDate = \Carbon\Carbon::parse($u->PEndDate);
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
                                <td>{{ 'PID-' }}-{{ $u->PID }}</td>
                                <td>{{ $u->ProjectName }}</td>
                                <td>{{ $u->ProjectManager }}</td>
                                <td>{{ $u->PStartDate }}</td>
                                <td>{{ $u->PEndDate }}</td>
                                @php
                                     $startDate = \Carbon\Carbon::now();
                                    $endDate = \Carbon\Carbon::parse($u->PEndDate);

                                    $numberOfDays = $endDate->diffInDays($startDate);

                                @endphp
                                <td>{{ $numberOfDays }}-{{ $progressRatio }}%</td>
                                <td>{{ $u->Status }}</td>

                                <td><span  style="color: 
                                    @if ($u->Priority == 'HIGH') red !important;
                                    @elseif ($u->Priority == 'LOW')
                                        green !important;
                                    @elseif ($u->Priority == 'MEDIUM')
                                        blue !important;
                                    @else
                                        black; /* Or any default color */ @endif ">{{ $u->Priority }}</span></td>



                                <td>{{ $u->AdminNote }}</td>
                                <td>{{ $u->ManagerNote }}</td>
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
                                    <a href="{{ route('viewproject', ['id' => $u->PID]) }}"> <button
                                            class="btn btn-secondary m-1"><i class="fa-solid fa-eye"></i></button></a>
                                     <a href="{{ route('viewproject', ['id' => $u->PID]) }}"> <button
                                                class="btn btn-primary m-1"><i class="fa-solid fa-pen"></i></button></a>
                                    <a href="{{ url('/projectupdate/delete/') }}/{{ $u->PID }}"><button
                                            class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button></a>
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
