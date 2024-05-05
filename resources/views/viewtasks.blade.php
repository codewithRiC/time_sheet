@push('title')
    <title>View Tasks</title>
@endpush

@if (session()->get('designation') == 'ADMIN')
    @include('layouts.adminheader')
@elseif (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@elseif (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif

<div id="layoutSidenav_content">
    <main>
        <div class="container rounded bg-white  p-1">

            <div class="row">

                <div class="col-md-12">
                    <div class="p-4 py-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-centre pt-2 " style="color:rgb(14, 14, 129);font-weight:700;font-size:20px; ">
                                VIEW TASKS</h4>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                        @endif
                        <fieldset disabled>
                            <div class="row mt-1">
                                <div class="col-md-6"><label class="labels fw-bold ">Task Name</label><input
                                        type="text" class="form-control" placeholder="Task Name" name="TaskName"
                                        value="{{ $user->TaskName }}"> <span class="text-danger">
                                        @error('TaskName')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6"><label class="labels fw-bold ">Task Description</label><input
                                        type="text" class="form-control" placeholder="Task Description"
                                        name="TaskDescription" value="{{ $user->TaskDescription }}"> <span class="text-danger">
                                        @error('TaskDescription')
                                            {{ $message }}
                                        @enderror
                                    </span></div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12 "><label class="labels fw-bold  ">Project name</label>
                                    {{-- <input
                                        type="text" class="form-control" placeholder="Project Name" name="ProjectName"
                                        value="{{ $users->ProjectName }}"> --}}
                                    <select name="PID" class="form-control">
                                        {{-- <option selected>Select the Project</option> --}}
                                        @foreach ($users as $u)
                                            <option value="{{ $u->PID }}">{{ $u->PID }} -
                                                {{ $u->ProjectName }} -
                                                {{ $u->Priority }} </option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('PID')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mt-2 "><label class="labels fw-bold">Start Date</label><input
                                        type="date" class="form-control" placeholder="start date" name="TStartDate"
                                        value="{{ $user->TStartDate }}"> <span class="text-danger">
                                        @error('TStartDate')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6 mt-2 "><label class="labels  fw-bold">Last Date</label><input
                                        type="date" class="form-control" placeholder="last date" name="TEndDate"
                                        value="{{ $user->TEndDate }}"> <span class="text-danger">
                                        @error('TEndDate')
                                            {{ $message }}
                                        @enderror
                                    </span></div>


                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Priority</label>
                                    <input
                                        type="text" class="form-control" placeholder="Priority" name="Priority"
                                        value="{{ $user->Priority }}">
                                    {{-- <select name="Priority" class="form-control">
                                        <option selected>Priority</option>
                                        <option style="color:red">HIGH</option>
                                        <option style="color:rgb(45, 45, 231)">MEDIUM</option>
                                        <option style="color:rgb(75, 239, 75)">LOW</option>
                                    </select> <span class="text-danger"> --}}
                                        @error('Priority')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Status</label>
                                    <input
                                        type="text" class="form-control" placeholder="Status" name="Status"
                                        value="{{ $user->Status }}">
                                    {{-- <select name="Status" class="form-control">
                                        <option selected>Status</option>
                                        <option>Not Started</option>
                                        <option>In Progress</option>
                                        <option>50% Completed</option>
                                        <option>75% Completed</option>
                                        <option>90% Completed</option>
                                        <option>Completed</option>
                                        <option>On Hold</option>
                                        <option>Cancelled</option>
                                    </select> --}}
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Progress</label><input
                                        type="text" class="form-control" placeholder="Mention the progress"
                                        name="Progress" value="{{ $user->Progress }}"> 
                                     </div>
                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Dependencies</label><input
                                        type="text" class="form-control" placeholder="Add Dependencies"
                                        name="Dependencies" value="{{ $user->Dependencies }}"> </div>

                                <div class="col-md-12 mt-2"><label class="labels  fw-bold">Manager
                                        Note</label><input type="text" class="form-control"
                                        placeholder="Manager Note" name="ManagerNote" value="{{ $user->ManagerNote }}"></div>
                                <div class="col-md-12 mt-2"><label class="labels  fw-bold">Employee
                                        Note</label><input type="text" class="form-control" placeholder="Admin Note"
                                        name="EmployeeNote" value="{{ $user->EmployeeNote }}"></div>

                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="{{ route('tasksupdate') }}"><button
                                        class="btn btn-primary mt-5 ">Back</button></a>
                            </div>

                        </fieldset>
                    </div>
                </div>

            </div>

        </div>
        </fieldset>

    </main>

</div>
</div>

@include('layouts.footer')
