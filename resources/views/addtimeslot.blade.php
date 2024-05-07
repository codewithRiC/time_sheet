@push('title')
    <title>Add time slot</title>
@endpush


@if (session()->get('designation')=="EMPLOYEE")
@include('layouts.employeeheader')       
@endif


<div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <h2>Add Time slot</h2>
                    <form action="/submit-tasks" method="POST" id="taskForm">
                        @csrf <!-- Laravel CSRF protection -->
                        <div id="taskFields">
                            <!-- Initial task and hours input fields -->
                            <div class="form-row mb-2 task-row">
                                <div class="col">
                                    <input type="text" class="form-control task" name="tasks[]" placeholder="Task" required>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control hours" name="hours[]" min="0" placeholder="Hours Spent" required>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-danger remove-task">&times;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addTask">Add Task</button>
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </form>
                </div>
            
    </main>

    </div>
    </div>

    @include('layouts.footer')
