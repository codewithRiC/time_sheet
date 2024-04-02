@push('title')
    <title>Create Department</title>
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
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-centre p-3 " style="color:rgb(14, 14, 129);font-weight:700;font-size:30px;">
                                        CREATE DEPARTMENT</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels fs-5 fw-bold">Department Code</label><input
                                        type="text" class="form-control" placeholder="Department Code" name="Code"
                                        value=""></div>
                                    <div class="col-md-12"><label class="labels fs-5 fw-bold">Department Name</label><input
                                            type="text" class="form-control" placeholder="Department Name" name="DepartmentName"
                                            value=""></div>
                                    <div class="col-md-12"><label class="labels fs-5 fw-bold"> Description</label><input
                                            type="text" class="form-control" placeholder="Add Description"
                                            name="Description" value=""></div>
        
                                </div>
                                <div class="row mt-1">
                                    
        
                                    <div class="col-md-12 mt-1"><label class="labels fs-5 fw-bold">Department Head</label><input
                                            type="text" class="form-control" placeholder="Department Head"
                                            name="DepartmentHead" value=""></div>
                                   
                                            <div class="form-group">
                                                <label class="labels fs-5 fw-bold" for="team_members">Team Members</label>
                                                <div>
                                                    @foreach($users as $user)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="team_members[]" id="user_{{ $user->id }}" value="{{ $user->id }}">
                                                        <label class="form-check-label" for="user_{{ $user->id }}">
                                                            {{ $user->name }} - {{ $user->details }} - {{ $user->yoe }} years
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
         
                                  
        
                                </div>
        
                                <div class="mt-4 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                        Department</button></div>
                            </div>
                        </div>
        
                    </div>
                </div>
              
    </main>

    </div>
    </div>
    
        

    @include('layouts.footer')

