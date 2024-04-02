@push('title')
    <title>Update Department</title>
@endpush

@if (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')
  
     
@endif



<div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Department Details
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Department ID</th>
                                    <th>Department Code</th>
                                    <th>Description</th>
                                    <th>Head</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
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
                                       
                                        <td>
        
                                            {{-- <a href="{{ route('viewemployee', ['id' => $u->id]) }}"> <button
                                                    class="btn btn-primary">View</button></a>
                                            <a href="{{ url('/employeeupdate/delete/') }}/{{ $u->id }}"><button
                                                    class="btn btn-danger">Delete</button></a> --}}
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
        
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        
        </div>
        </div>
        
    @include('layouts.footer')

