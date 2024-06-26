@push('title')
    <title>View Project</title>
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
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">View Project</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels  fw-bold">Project Name</label><input
                                        type="text" class="form-control" placeholder="Project Name"
                                        name="ProjectName" value="{{ $user->ProjectName }}"> <span class="text-danger">
                                        @error('ProjectName')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6"><label class="labels  fw-bold">Project
                                        Description</label><input type="text" class="form-control"
                                        placeholder="Project Description" name="ProjectDescription"
                                        value="{{ $user->ProjectDescription }}"> <span class="text-danger">
                                        @error('ProjectDescription')
                                            {{ $message }}
                                        @enderror
                                    </span></div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 "><label class="labels  fw-bold">Start Date</label><input
                                        type="date" class="form-control" placeholder="start date" name="PStartDate"
                                        value="{{ $user->PStartDate }}">
                                    <span class="text-danger">
                                        @error('PStartDate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 "><label class="labels  fw-bold">Last Date</label><input
                                        type="date" class="form-control" placeholder="last date" name="PEndDate"
                                        value="{{ $user->PEndDate }}">
                                    <span class="text-danger">
                                        @error('PEndDate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                                <div class="col-md-6 mt-2">
                                    <label class="labels  fw-bold">Project manager</label>
                                    <select name="ProjectManager" class="form-control">
                                        <option selected disabled>Select project manager</option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->name }}"
                                                {{ $u->name == old('ProjectManager', $user->ProjectManager) ? 'selected' : '' }}>
                                                {{ $u->name }} - {{ $u->details }} - {{ $u->yoe }}
                                                years
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('ProjectManager')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label class="labels  fw-bold">Priority</label>
                                    <select name="Priority" class="form-control">
                                        <option disabled selected>Select Priority</option>
                                        <option value="HIGH" style="color: red!important"
                                            {{ $user->Priority == 'HIGH' ? 'selected' : '' }}>HIGH</option>
                                        <option value="MEDIUM" style="color: rgb(45, 45, 231)!important"
                                            {{ $user->Priority == 'MEDIUM' ? 'selected' : '' }}>MEDIUM</option>
                                        <option value="LOW" style="color: rgb(75, 239, 75)!important"
                                            {{ $user->Priority == 'LOW' ? 'selected' : '' }}>LOW</option>
                                    </select>
                                </div>


                                <div class="col-md-6 mt-2">
                                    <label class="labels  fw-bold">Status</label>
                                    <select name="Status" class="form-control">
                                        <option disabled>Status</option>
                                        <option value="Not Started"
                                            {{ $user->Status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                                        <option value="In Progress"
                                            {{ $user->Status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ $user->Status == 'Completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="On Hold" {{ $user->Status == 'On Hold' ? 'selected' : '' }}>On
                                            Hold</option>
                                        <option value="Cancelled" {{ $user->Status == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                </div>


                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Tags or
                                        Categories</label><input type="text" class="form-control"
                                        placeholder="Add Tags" name="Tags" value="{{ $user->Tags }}"></div>
                                <div class="col-md-12 mt-2"><label
                                        class="labels  fw-bold">Dependencies</label><input type="text"
                                        class="form-control" placeholder="Add Dependencies" name="Dependencies"
                                        value="{{ $user->Dependencies }}"></div>
                                @if (session()->get('designation') == 'ADMIN')
                                    <div class="col-md-12 mt-2"><label class="labels  fw-bold">Admin
                                            Note</label><input type="text" class="form-control"
                                            placeholder="Admin Note" name="AdminNote" value="{{ $user->AdminNote }}">
                                    </div>
                                    <fieldset disabled>
                                    <div class="col-md-12 mt-2"><label class="labels  fw-bold">Manager
                                            Note</label><input type="text" class="form-control"
                                            placeholder="Manager Note" name="ManagerNote"
                                            value="{{ $user->ManagerNote }}"></div>
                                    </fieldset>       
                                @elseif (session()->get('designation') == 'MANAGER')
                                
                                    <div class="col-md-12 mt-2"><label class="labels fw-bold">Manager
                                            Note</label><input type="text" class="form-control"
                                            placeholder="Manager Note" name="ManagerNote"
                                            value="{{ $user->ManagerNote }}"></div>
                                            <fieldset disabled>
                                                <div class="col-md-12 mt-2"><label class="labels  fw-bold">Admin
                                                        Note</label><input type="text" class="form-control"
                                                        placeholder="Admin Note" name="AdminNote"
                                                        value="{{ $user->AdminNote }}"></div>
                                            </fieldset>         
                                @endif


                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('projectupdate') }}"><button
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
