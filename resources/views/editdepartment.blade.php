@push('title')
    <title>Edit Department</title>
@endpush

@if (session()->get('designation') == 'ADMIN')
    @include('layouts.adminheader')
@elseif (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@endif



<div id="layoutSidenav_content">
    <main>

        <div class="container rounded bg-white  p-1">

            <div class="row">

                <div class="col-md-12">
                    <div class="p-4 py-3">
                        <form action="{{ url('/') }}/editdepartment/{{ $user->DID }}" method="post">
                            @csrf

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre pt-2 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">
                                    Edit Department</h4>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels  fw-bold">Department Code</label><input
                                        type="text" class="form-control" placeholder="Department Code" name="Code"
                                        value="{{ $user->Code }}"> <span class="text-danger">
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
                                        name="Description" value="{{ $user->Description }}"> <span class="text-danger">
                                        @error('Description')
                                            {{ $message }}
                                        @enderror
                                    </span></div>

                            </div>
                            <div class="row mt-1">


                                <div class="col-md-12 mt-1"> <label class="labels  fw-bold">Department Head</label>
                                    <select name="DepartmentHead" class="form-control">
                                        <option selected disabled>Select Deaprtment Head</option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->name }}"
                                                {{ $u->name == old('DepartmentHead', $user->DepartmentHead) ? 'selected' : '' }}>
                                                {{ $u->name }} - {{ $u->details }} - {{ $u->yoe }}
                                                years
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('DepartmentHead')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group mt-2">
                                    <label class="labels fw-bold" for="team_members">Team Members</label>
                                    <div>
                                        @php $s = 1; @endphp
                                        @foreach ($new as $registration)
                                            @if ($registration->id !== $user->id)
                                                <!-- Exclude the current user -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="team_members[]" id="user_{{ $registration->id }}"
                                                        value="{{ $registration->id }}"
                                                        {{ $users->contains('id', $registration->id) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="user_{{ $registration->id }}">
                                                        {{ $s++ }}-{{ $registration->name }}-{{ $registration->details }}-{{ $registration->yoe }}
                                                        years
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach


                                        <span class="text-danger">
                                            @error('team_members')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Project</button></div>
                        </form>

                    </div>
                    
                </div>
            </div>

        </div>

</div>


</main>

</div>
</div>

@include('layouts.footer')
