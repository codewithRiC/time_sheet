@push('title')
    <title>Create Tasks</title>
@endpush

@if (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@endif



<div id="layoutSidenav_content">
    <main>
        <div class="container rounded bg-white  p-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-2 py-3">
                        <form action="{{ url('/') }}/createtasks" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre p-3 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:30px;">ADD TASKS</h4>
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <p>{{ session()->get('success') }}</p>
                                </div>
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels fs-5 fw-bold">Task Name</label><input
                                        type="text" class="form-control" placeholder="Task Name" name="TaskName"
                                        value=""> <span class="text-danger">
                                        @error('TaskName')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6"><label class="labels fs-5 fw-bold">Task Description</label><input
                                        type="text" class="form-control" placeholder="Task Description"
                                        name="TaskDescription" value=""> <span class="text-danger">
                                        @error('TaskDescription')
                                            {{ $message }}
                                        @enderror
                                    </span></div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6 "><label class="labels fs-5 fw-bold">Start Date</label><input
                                        type="date" class="form-control" placeholder="start date" name="TStartDate"
                                        value=""> <span class="text-danger">
                                        @error('TStartDate')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6 "><label class="labels fs-5 fw-bold">Last Date</label><input
                                        type="date" class="form-control" placeholder="last date" name="TEndDate"
                                        value=""> <span class="text-danger">
                                        @error('TEndDate')
                                            {{ $message }}
                                        @enderror
                                    </span></div>


                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Priority</label>
                                    <select name="Priority" class="form-control">
                                        <option selected>Priority</option>
                                        <option style="color:red">HIGH</option>
                                        <option style="color:rgb(45, 45, 231)">MEDIUM</option>
                                        <option style="color:rgb(75, 239, 75)">LOW</option>
                                    </select> <span class="text-danger">
                                        @error('Priority')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Status</label>
                                    <select name="Status" class="form-control">
                                        <option selected>Status</option>
                                        <option>Not Started</option>
                                        <option>In Progress</option>
                                        <option>Completed</option>
                                        <option>On Hold</option>
                                        <option>Cancelled</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Progress</label><input
                                        type="text" class="form-control" placeholder="Mention the progress"
                                        name="Progress" value=""> <span class="text-danger">
                                        @error('Status')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Dependencies</label><input
                                        type="text" class="form-control" placeholder="Add Dependencies"
                                        name="Dependencies" value=""> </div>
                                <div class="col-md-12 mt-1"><label class="labels fs-5 fw-bold">Project name</label>
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
                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Manager
                                        Note</label><input type="text" class="form-control"
                                        placeholder="Manager Note" name="ManagerNote" value=""></div>
                                <div class="col-md-6 mt-1"><label class="labels fs-5 fw-bold">Employee
                                        Note</label><input type="text" class="form-control" placeholder="Admin Note"
                                        name="EmployeeNote" value=""></div>

                            </div>

                            <div class="mt-4 text-center"><button class="btn btn-primary profile-button"
                                    type="submit">Save Task</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>

</div>
</div>

@include('layouts.footer')
