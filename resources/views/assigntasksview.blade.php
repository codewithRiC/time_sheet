@push('title')
    <title>View assign tasks</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
            <main>
                View assign tasks
    </main>

    </div>
    </div>

    @include('layouts.footer')
