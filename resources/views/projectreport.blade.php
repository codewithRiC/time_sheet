@push('title')
    <title>Project report</title>
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
                Project report
    </main>

    </div>
    </div>

    @include('layouts.footer')
