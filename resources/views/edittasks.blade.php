@push('title')
    <title>Edit Tasks</title>
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
                        <form action="{{ url('/') }}/edittasks/{{ $user->TID }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre pt-2 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">Edit Tasks</h4>
                            </div>
                            <div class="row mt-2">
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
                                            name="TaskDescription" value="{{ $user->TaskDescription }}"> <span
                                            class="text-danger">
                                            @error('TaskDescription')
                                                {{ $message }}
                                            @enderror
                                        </span></div>

                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12 "><label class="labels fw-bold  ">Project name</label>
                                        <select name="PID" class="form-control">
                                            <option selected disabled>Select Project Name..</option>
                                            @foreach ($new as $registration)
                                                <option value="{{ $registration->PID }}"
                                                    {{ $registration->PID == old('PID', $user->PID) ? 'selected' : '' }}>
                                                    {{ $registration->name }} - {{ $registration->details }} - {{ $registration->yoe }} years
                                                </option>
                                            @endforeach
                                        
                                            @foreach ($users as $registration)
                                                @if ($registration->PID !== $user->PID) <!-- Exclude the current project -->
                                                    <option value="{{ $registration->PID }}">
                                                        {{ $registration->name }} - {{ $registration->details }} - {{ $registration->yoe }} years
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                    
                                        <span class="text-danger">
                                            @error('PID')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mt-2 "><label class="labels fw-bold">Start Date</label><input
                                            type="date" class="form-control" placeholder="start date"
                                            name="TStartDate" value="{{ $user->TStartDate }}"> <span
                                            class="text-danger">
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
                                        <select name="Priority" class="form-control">
                                            <option disabled selected>Select Priority</option>
                                            <option value="HIGH" style="color: red!important"
                                                {{ $user->Priority == 'HIGH' ? 'selected' : '' }}>HIGH</option>
                                            <option value="MEDIUM" style="color: rgb(45, 45, 231)!important"
                                                {{ $user->Priority == 'MEDIUM' ? 'selected' : '' }}>MEDIUM</option>
                                            <option value="LOW" style="color: rgb(75, 239, 75)!important"
                                                {{ $user->Priority == 'LOW' ? 'selected' : '' }}>LOW</option>
                                        </select>
                                        @error('Priority')
                                            {{ $message }}
                                        @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6 mt-2"><label class="labels  fw-bold">Status</label>
                                        <select name="Status" class="form-control">
                                            <option disabled>Status</option>
                                            <option value="Not Started"
                                                {{ $user->Status == 'Not Started' ? 'selected' : '' }}>Not Started
                                            </option>
                                            <option value="In Progress"
                                                {{ $user->Status == 'In Progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            <option value="50% Completed"
                                                {{ $user->Status == '50% Completed' ? 'selected' : '' }}>
                                                50% Completed</option>
                                            <option value="75% Completed"
                                                {{ $user->Status == '75% Completed' ? 'selected' : '' }}>
                                                75% Completed</option>
                                            <option value="90% Completed"
                                                {{ $user->Status == '90% Completed' ? 'selected' : '' }}>
                                                90% Completed</option>

                                            <option value="Completed"
                                                {{ $user->Status == 'Completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="On Hold" {{ $user->Status == 'On Hold' ? 'selected' : '' }}>
                                                On
                                                Hold</option>
                                            <option value="Cancelled"
                                                {{ $user->Status == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                        </select>
                                        
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
                                            placeholder="Manager Note" name="ManagerNote"
                                            value="{{ $user->ManagerNote }}"></div>
                                    <div class="col-md-12 mt-2"><label class="labels  fw-bold">Employee
                                            Note</label><input type="text" class="form-control"
                                            placeholder="Admin Note" name="EmployeeNote"
                                            value="{{ $user->EmployeeNote }}"></div>

                                </div>

                                <div class="mt-4 text-center"><button class="btn btn-primary profile-button"
                                        type="submit">Save Project</button></div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

    </main>

</div>
</div>

@include('layouts.footer')
