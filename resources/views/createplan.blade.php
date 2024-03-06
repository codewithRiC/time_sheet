@push('title')
    <title>Create Plan</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
            <main>
                Create Plan
    </main>

    </div>
    </div>

    @include('layouts.footer')
