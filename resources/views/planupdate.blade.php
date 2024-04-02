@push('title')
    <title>Update Plan</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Plan Details
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Profile pic</th>
                            <th>Name</th>
                            <th>EmployeeId</th>
                            <th>Designation</th>
                            <th>Adress</th>
                            <th>Phone</th>
                            <th>Qualification</th>
                            <th>Year Of experience</th>
                            <th>Details</th>
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
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                    <a href="{{ route('viewemployee', ['id' => $u->id]) }}"> <button
                                            class="btn btn-primary">View</button></a>
                                    <a href="{{ url('/employeeupdate/delete/') }}/{{ $u->id }}"><button
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