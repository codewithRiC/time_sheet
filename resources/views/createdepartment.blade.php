@push('title')
    <title>Create Department</title>
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
                        <form action="{{ url('/') }}/createdepartment" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre  "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">
                                    CREATE DEPARTMENT</h4>
                            </div>
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels  fw-bold">Department Code</label><input
                                        type="text" class="form-control" placeholder="Department Code" name="Code"
                                        value=""> <span class="text-danger">
                                            @error('Code')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                <div class="col-md-12"><label class="labels fw-bold">Department Name</label><input
                                        type="text" class="form-control" placeholder="Department Name"
                                        name="DepartmentName" value=""> <span class="text-danger">
                                            @error('DepartmentName')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                <div class="col-md-12"><label class="labels  fw-bold"> Description</label><input
                                        type="text" class="form-control" placeholder="Add Description"
                                        name="Description" value=""> <span class="text-danger">
                                            @error('Description')
                                                {{ $message }}
                                            @enderror
                                        </span></div>

                            </div>
                            <div class="row mt-1">


                                <div class="col-md-12 mt-1"> <label class="labels  fw-bold">Department Head</label>
                                    <select name="DepartmentHead" class="form-control">
                                        <option selected disabled>Select Department Head</option>
                                        <option selected>Select project manager</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}">{{ $user->name }} -
                                                {{ $user->details }} -
                                                {{ $user->yoe }} years</option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('DepartmentHead')
                                            {{ $message }}
                                        @enderror
                                    </span></div>

                                <div class="form-group mt-2">
                                    <label class="labels fw-bold" for="team_members[]">Team Members</label>
                                    <div>
                                        <select name="team_members[]" class="form-control" multiple id="team_members_select">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->details }} - {{ $user->yoe }} years</option>
                                            @endforeach
                                        </select>
                                        
                                      
                                        
                                        <span class="text-danger">
                                            @error('team_members')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>



                            </div>

                            <div class="mt-4 text-center"><button class="btn btn-primary profile-button"
                                    type="submit">Save
                                    Department</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>

</div>
</div>





@include('layouts.footer')
