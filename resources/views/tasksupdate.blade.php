@push('title')
    <title>Update Tasks</title>
@endpush

@if (session()->get('designation')=="ADMIN")
@include('layouts.adminheader')
@elseif (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')  
@elseif (session()->get('designation')=="EMPLOYEE")
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
                                    <th>Start Date</th>
                                    <th>End date</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Manager Note</th>
                                    <th>Employee Note</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
        
                                </tr>
                            </thead>
        
                            <tbody>
                                @php
                                    $sno = 1;
                                @endphp
        
                                {{-- @foreach ($user as $u) --}}
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
        
                                            {{-- <a href="{{ route('viewemployee', ['id' => $u->id]) }}"> <button
                                                    class="btn btn-primary">View</button></a>
                                            <a href="{{ url('/employeeupdate/delete/') }}/{{ $u->id }}"><button
                                                    class="btn btn-danger">Delete</button></a> --}}
                                        </td>
                                    </tr>
                                {{-- @endforeach
         --}}
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        
        </div>
        </div>
        

    @include('layouts.footer')

