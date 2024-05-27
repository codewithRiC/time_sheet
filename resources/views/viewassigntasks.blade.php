@push('title')
    <title>view Assign Tasks</title>
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
                        Assigned  Details
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Task name</th>
                                  
                                    {{-- <th>Description</th> --}}
                                    <th>Memebers</th>
                                    <th>Start Date</th>
                                    
                                    {{-- <th>Action</th> --}}
        
                                </tr>
                            </thead>
        
                            <tbody>
                                @php
                                    $sno = 1;
                                @endphp
        
                                @foreach ($tasks as $u)
                                    <tr>
                                        <td>{{ $sno++ }}</td>
                                        <td>{{ $u->TaskName }}</td>
                                       
                                        {{-- <td>{{ $u->Description }}</td> --}}
                                        <td>{{ $u->team_member_name }}</td>
                                        <td>{{ $u->StartDate }}</td>
                                        
                                       
                                        {{-- <td>
        
                                            <div style="display: flex ">
                                                <a href="{{ route('viewdepartment', ['id' => $u->DID]) }}"> <button
                                                        class="btn btn-secondary m-1"><i class="fa-solid fa-eye"></i></button></a>
                                                 <a href="{{ route('editdepartment', ['id' => $u->DID]) }}"> <button
                                                            class="btn btn-primary m-1"><i class="fa-solid fa-pen"></i></button></a>
                                                <a href="{{ url('/departmentupdate/delete/') }}/{{ $u->DID }}"><button
                                                        class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button></a>
                                                </div>        
                                        </td> --}}
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

