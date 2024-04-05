@push('title')
    <title>View Department</title>
@endpush

@if (session()->get('designation') == 'ADMIN')
    @include('layouts.adminheader')
@elseif (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@endif



<div id="layoutSidenav_content">
    <main>
        <fieldset disabled>
            <div class="container rounded bg-white  p-1">

                <div class="row">

                    <div class="col-md-12">
                        <div class="p-4 py-3">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre pt-2 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">View Department</h4>
                            </div>
                            <fieldset disabled>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels  fw-bold">Department Code</label><input
                                            type="text" class="form-control" placeholder="Department Code"
                                            name="Code" value="{{ $user->Code }}"> <span class="text-danger">
                                            @error('Code')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                    <div class="col-md-12"><label class="labels fw-bold">Department Name</label><input
                                            type="text" class="form-control" placeholder="Department Name"
                                            name="DepartmentName" value="{{ $user->DepartmentName }}"> <span
                                            class="text-danger">
                                            @error('DepartmentName')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                    <div class="col-md-12"><label class="labels  fw-bold"> Description</label><input
                                            type="text" class="form-control" placeholder="Add Description"
                                            name="Description" value="{{ $user->Description }}"> <span
                                            class="text-danger">
                                            @error('Description')
                                                {{ $message }}
                                            @enderror
                                        </span></div>

                                </div>
                                <div class="row mt-1">


                                    <div class="col-md-12 mt-1"> <label class="labels  fw-bold">Department Head</label>
                                        <input
                                            type="text" class="form-control" placeholder="Department Head"
                                            name="DepartmentHead" value="{{ $user->DepartmentHead }}"> <span
                                            class="text-danger">
                                        <span class="text-danger">
                                            @error('DepartmentHead')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label class="labels fw-bold" for="team_members">Team Members</label>
                                        <div>
                                            @php
                                                $s=1;
                                            @endphp
                                            @foreach ($users as $u)
                                             {{ $s++ }}-{{ $u->name }}-{{ $u->details }}-{{ $u->yoe }}<br>
                                            @endforeach
                                            <span class="text-danger">
                                                @error('team_members')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('departmentupdate') }}"><button
                                    class="btn btn-primary mt-5 ">Back</button></a>
                        </div>

                    </div>
                </div>

            </div>

</div>
</fieldset>

</main>

</div>
</div>

@include('layouts.footer')
