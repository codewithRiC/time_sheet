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
                            <th>Remaining days</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Admin Note</th>
                            <th>Manager Note</th>
                            <th>Updated Date</th>
                            <th>Action</th>


                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $sno = 1;

                            // Assume $start_date and $end_date are available in the current scope

                        @endphp

                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $sno++ }}</td>
                                <td>{{ 'PID-' }}-{{ $u->PID }}</td>
                                <td>{{ $u->ProjectName }}</td>
                                <td>{{ $u->ProjectManager }}</td>
                                <td>{{ $u->PStartDate }}</td>
                                @php
                                     $startDate = \Carbon\Carbon::now();
                                    $endDate = \Carbon\Carbon::parse($u->PEndDate);

                                    $numberOfDays = $endDate->diffInDays($startDate);

                                @endphp
                                <td>{{ $numberOfDays }}</td>
                                <td>{{ $u->Status }}</td>

                                <td
                                    style="color: 
                                @if ($u->Priority == 'HIGH') red;
                                @elseif ($u->Priority == 'LOW')
                                    green;
                                @elseif ($u->Priority == 'MEDIUM')
                                    blue;
                                @else
                                    black; /* Or any default color */ @endif
                            ">
                                    {{ $u->Priority }}</td>



                                <td>{{ $u->AdminNote }}</td>
                                <td>{{ $u->ManagerNote }}</td>
                                <td>{{ $u->updated_at }}</td>
                                <td>

                                    <a href="{{ route('viewproject', ['id' => $u->PID]) }}"> <button
                                            class="btn btn-primary">View</button></a>
                                    <a href="{{ url('/projectupdate/delete/') }}/{{ $u->PID }}"><button
                                            class="btn btn-danger">Delete</button></a>
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
