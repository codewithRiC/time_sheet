@push('title')
    <title>Update Employee</title>
@endpush

@if (session()->get('designation')=="ADMIN")
@include('layouts.adminheader')
@elseif (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')   
     
@endif



<div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Employee Details
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
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
                                $sno=1
                           @endphp
                          
                           @foreach ($user as $u)
                               
                          
                           <tr>
                               <td>{{ $sno++ }}</td>
                               <td>{{ $u->name }}</td>
                               <td>{{ "EMP" }}-{{ $u->id }}</td>
                               <td>{{ $u->designation }}</td>
                               <td>{{ $u->address }}</td>
                               <td>{{ $u->phone }}</td>
                               <td>{{ $u->qualification }}</td>
                               <td>{{ $u->yoe }}</td>
                               <td>{{ $u->details }}</td>
                               <td>
                                   
                                   <button class="btn btn-primary">Edit</button>
                                   <button class="btn btn-danger">Delete</button>
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
