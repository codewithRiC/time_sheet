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
        <div class="container rounded bg-white  p-1 ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="p-4 py-3">
                        <form action="{{route('projectreportpdf') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre pt-2 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px; ">Project Wise Report</h4>
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <p>{{ session()->get('success') }}</p>
                                </div>
                            @endif

                         

                            <div class="row mt-2">
                                <div class="col-md-12 "><label class="labels fw-bold  ">Project name</label>
                                    <select name="PID" class="form-control">
                                        <option selected>Select the Project</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->PID}}">{{ $user->PID }} -
                                                {{ $user->ProjectName }} -
                                                {{ $user->Priority }} </option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('PID')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mt-2 "><label class="labels fw-bold">Start Date</label><input
                                        type="date" class="form-control" placeholder="start date" name="StartDate"
                                        value=""> <span class="text-danger">
                                        @error('TStartDate')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6 mt-2 "><label class="labels  fw-bold">Last Date</label><input
                                        type="date" class="form-control" placeholder="last date" name="EndDate"
                                        value=""> <span class="text-danger">
                                        @error('TEndDate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                            </div>

                            <div class="mt-4 text-center"><button class="btn btn-primary profile-button"
                                    type="submit">Export PDF</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>

    </div>
    </div>

    @include('layouts.footer')
