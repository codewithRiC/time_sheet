@push('title')
    <title>Update Project</title>
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
                        Project Details
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Adress</th>
                                    <th>Phone</th>
                                    <th>Qualification</th>
                                    <th>Year Of experience</th>
                                    <th>Details</th>
                                   
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td>    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>  </td>
                                </tr>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
    </main>

    </div>
    </div>

    @include('layouts.footer')

