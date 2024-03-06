@push('title')
    <title>Add time slot</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
            <main>
                Add time slot
    </main>

    </div>
    </div>

    @include('layouts.footer')
