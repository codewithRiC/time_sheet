@push('title')
    <title>Add time slot</title>
@endpush


@if (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif


<div id="layoutSidenav_content">
    <main>
        <div class="container mt-5">
            <h2 style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">Add Time slot</h2>
            <form action="{{ url('/') }}/addtimeslot" method="POST" id="taskForm">
               
                @csrf <!-- Laravel CSRF protection -->
                <div id="taskFields">
                    <!-- Initial task and hours input fields -->

                    <div class="form-row mb-2 task-row">
                        <div class="col-md-12 "><label class="labels fw-bold ">User ID</label><input type="text"
                                class="form-control" placeholder="UID" name="UID"
                                value="{{ $id }}"> <span class="text-danger">
                                @error('UID')
                                    {{ $message }}
                                @enderror
                            </span></div>
                        <div class="col-md-6"><label class="labels fw-bold ">Date</label><input type="date"
                                class="form-control" placeholder="date" name="date"
                                value="{{ date('Y-m-d') }}" >
                            <span class="text-danger">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><label class="labels fw-bold ">Day</label><input type="text"
                            class="form-control" placeholder="day" name="day"
                            value="{{ now()->format('l') }}" >
                        <span class="text-danger">
                            @error('day')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    </div>
                    <div class="form-row mb-2 task-row">
                        <div class="col">
                            <label class="labels fw-bold ">Task</label>
                            <select name="TID[]" class="form-control">
                                <option selected disabled>Select task name</option>
                                <option selected>Select task name</option>
                                @foreach ($task as $t)
                                    <option value="{{ $t->TID }}">{{ $t->TaskName }} -
                                        {{ $t->TaskDescription }} </option>
                                @endforeach
                                <option value="0">Others</option>

                            </select>
                        </div>
                        <div class="col">
                            <label class="labels fw-bold ">Time Spent</label>
                            
                            <input type="number" class="form-control hours" name="hours[]" min="0"
                                placeholder="Hours Spent" required>
                        </div>
                        <div class="col-auto" style="padding-top: 30px">
                            {{-- <label class="labels fw-bold ">Action</label> --}}
                            <button type="button" class="btn btn-danger remove-task">&times;</button>
                        </div>
                    </div>
                    
                   
                </div>
              
                <div class="form-row mb-2 task-row">
                    <div class="col-md-12 "><label class="labels fw-bold ">Remarks</label><input type="text"
                            class="form-control" placeholder="remarks" name="remarks"
                            value=""> <span class="text-danger">
                            @error('remarks')
                                {{ $message }}
                            @enderror
                        </span></div>
                    
                </div>
                <button type="button" class="btn btn-primary mt-5" id="addTask" >Add Task</button>
                <button type="submit" class="btn btn-success mt-5">Submit</button>
            </form>
        </div>

    </main>

</div>
</div>



@include('layouts.footer')

<script>
    $(document).ready(function() {
        // Add task button functionality
        $("#addTask").click(function() {
            
                var html = '<div class="form-row mb-2 task-row">' +
                    '<div class="col">' +
                    '<label class="labels fw-bold">Task</label>' +
                    '<select name="TID[]" class="form-control">' +
                    '<option selected disabled>Select task name</option>' +
                    '@foreach ($task as $t)' +
                    '<option value="{{ $t->TID }}">{{ $t->TaskName }} - {{ $t->TaskDescription }}</option>' +
                    '@endforeach' +
                    '<option value="0">Others</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col">' +
                    '<label class="labels fw-bold">Time Spent</label>' +
                    '<input type="number" class="form-control hours" name="hours[]" min="0" placeholder="Hours Spent" required>' +
                    '</div>' +
                    '<div class="col-auto" style="padding-top: 30px">' +
                    '<button type="button" class="btn btn-danger remove-task">&times;</button>' +
                    '</div>' +
                    '</div>';
  
  
            $("#taskFields").append(html);
        });
  
        // Remove task button functionality
        $(document).on("click", ".remove-task", function() {
            $(this).closest(".task-row").remove();
        });
    });
  </script>
