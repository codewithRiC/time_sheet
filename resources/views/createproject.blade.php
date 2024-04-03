@push('title')
    <title>Create Project</title>
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
                        <form action="{{ url('/') }}/createproject" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-centre pt-2 "
                                    style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">
                                    ADD PROJECT</h4>
                            </div>
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                            @endif


                            <div class="row mt-1">
                                <div class="col-md-6"><label class="labels  fw-bold">Project Name</label><input
                                        type="text" class="form-control" placeholder="Project Name"
                                        name="ProjectName" value="">
                                    <span class="text-danger">
                                        @error('ProjectName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6"><label class="labels  fw-bold">Project
                                        Description</label><input type="text" class="form-control"
                                        placeholder="Project Description" name="ProjectDescription" value="">
                                    <span class="text-danger">
                                        @error('ProjectDescription')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 "><label class="labels  fw-bold">Start Date</label><input
                                        type="date" class="form-control" placeholder="start date" name="PStartDate"
                                        value="">
                                    <span class="text-danger">
                                        @error('PStartDate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 "><label class="labels  fw-bold">Last Date</label><input
                                        type="date" class="form-control" placeholder="last date" name="PEndDate"
                                        value="">
                                    <span class="text-danger">
                                        @error('PEndDate')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Project manager</label>
                                    <select name="ProjectManager" class="form-control">
                                        <option selected>Select project manager</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}">{{ $user->name }} -
                                                {{ $user->details }} -
                                                {{ $user->yoe }} years</option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">
                                        @error('ProjectManager')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Priority</label>
                                    <select name="Priority" class="form-control">
                                        <option selected>Priority</option>
                                        <option style="color:red">HIGH</option>
                                        <option style="color:rgb(45, 45, 231)">MEDIUM</option>
                                        <option style="color:rgb(75, 239, 75)">LOW</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('Status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Status</label>
                                    <select name="Status" class="form-control">
                                        <option selected>Status</option>
                                        <option>Not Started</option>
                                        <option>In Progress</option>
                                        <option>50% Completed</option>
                                        <option>75% Completed</option>
                                        <option>90% Completed</option>
                                        <option>Completed</option>
                                        <option>On Hold</option>
                                        <option>Cancelled</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('Priority')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6 mt-2"><label class="labels  fw-bold">Tags or
                                        Categories</label><input type="text" class="form-control"
                                        placeholder="Add Tags" name="Tags" value=""></div>
                                <div class="col-md-12 mt-2"><label
                                        class="labels  fw-bold">Dependencies</label><input type="text"
                                        class="form-control" placeholder="Add Dependencies" name="Dependencies"
                                        value=""></div>
                                <div class="col-md-12 mt-2"><label class="labels  fw-bold">Admin Note</label><input
                                        type="text" class="form-control" placeholder="Admin Note" name="AdminNote"
                                        value=""></div>
                                <div class="col-md-12 mt-2"><label class="labels  fw-bold">Manager Note</label><input
                                        type="text" class="form-control" placeholder="Manager Note"
                                        name="ManagerNote" value=""></div>

                            </div>

                            <div class="mt-4 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Project</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>    
        </div>    
    </main>

</div>
</div>

@include('layouts.footer')
