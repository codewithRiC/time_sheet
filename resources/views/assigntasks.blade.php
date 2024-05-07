@push('title')
    <title>Assigning tasks</title>
@endpush

@if (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')
  
     
@endif



<div id="layoutSidenav_content">
            <main>
                <div class="container rounded bg-white  p-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-2 py-3">
                                <form action="{{ url('/') }}/assigntasks" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-centre  "
                                            style="color:rgb(14, 14, 129);font-weight:700;font-size:20px;">
                                            Assign Tasks</h4>
                                    </div>
                                    @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <p>{{ session()->get('success') }}</p>
                                    </div>
                                    @endif
        
                                  
                                   
                                    
                                    <div class="row mt-1">
        
        
                                        <div class="col-md-12 mt-1"> <label class="labels  fw-bold">Task name</label>
                                            <select name="TID" class="form-control">
                                                <option selected disabled>Select task name</option>
                                                <option selected>Select task name</option>
                                                @foreach ($task as $t)
                                                    <option value="{{ $t->TID }}">{{ $t->TaskName }} -
                                                        {{ $t->TaskDescription }} </option>
                                                @endforeach
        
                                            </select>
                                            <span class="text-danger">
                                                @error('TID')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
        
                                        <div class="form-group mt-2">
                                            <label class="labels fw-bold" for="team_members[]">Team Members</label>
                                            <div>
                                                {{-- <select name="team_members[]" class="form-control" multiple id="team_members_select">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->details }} - {{ $user->yoe }} years</option>
                                                    @endforeach
                                                </select>
                                                 --}}

                                                 <select name="team_members[]" class="form-control" multiple id="team_members_select">
                                                    @foreach ($users as $user)

                                
                                                        {{-- Fetch the task count for the current user --}}
                                                        {{-- @php
                                                            $taskCount = isset($userTaskCounts[$user->id]) ? $userTaskCounts[$user->id] : 0; // Default to 0 if task count not available
                                                        @endphp --}}
                                                        {{-- Include task count as a data attribute --}}
                                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->details }} - {{ $user->yoe }} years ({{ $userTaskCounts[$user->id] }} tasks)</option>
                                                    @endforeach
                                                </select>
                                                
                                                
                                              
                                                
                                                <span class="text-danger">
                                                    @error('UID')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
        
        
        
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels  fw-bold">Start Date</label><input
                                                type="date" class="form-control" placeholder="Start Date" name="StartDate"
                                                value=""> <span class="text-danger">
                                                    @error('StartDate')
                                                        {{ $message }}
                                                    @enderror
                                                </span></div>
                                        <div class="col-md-6"><label class="labels fw-bold">Remark</label><input
                                                type="text" class="form-control" placeholder="Remark"
                                                name="Remark" value=""> <span class="text-danger">
                                                    @error('Remark')
                                                        {{ $message }}
                                                    @enderror
                                                </span></div>
                                       
        
                                    </div>
        
                                    <div class="mt-4 text-center"><button class="btn btn-primary profile-button"
                                            type="submit">Save
                                        </button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </main>

    </div>
    </div>

    @include('layouts.footer')

