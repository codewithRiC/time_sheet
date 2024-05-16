@push('title')
    <title>View Time slot</title>
@endpush


@if (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif


<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Allocation Details
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

    </main>

</div>
</div>



@include('layouts.footer')

