@push('title')
    <title>Update Plan</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
            <main>
                Update Plan
    </main>

    </div>
    </div>

@include('layouts.footer')