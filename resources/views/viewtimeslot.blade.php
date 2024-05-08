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
                            <th>Total Time Spent</th>
                           
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $sno = 1;
                        @endphp

                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $sno++ }}</td>
                               
                               
                                <td>{{ $u->date }}</td>
                                <td>{{ $u->day }}</td>
                                <td>{{ $u->hours}}</td>
                               
                                <td>

                                    <div style="display: flex ">
                                        {{-- <a href="{{ route('allocationdetails', ['id' => $u->DID]) }}"> <button
                                                class="btn btn-secondary m-1"><i class="fa-solid fa-eye"></i></button></a> --}}
                                         {{-- <a href="{{ route('editdepartment', ['id' => $u->DID]) }}"> <button
                                                    class="btn btn-primary m-1"><i class="fa-solid fa-pen"></i></button></a> --}}
                                        {{-- <a href="{{ url('/departmentupdate/delete/') }}/{{ $u->DID }}"><button
                                                class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button></a> --}}
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

