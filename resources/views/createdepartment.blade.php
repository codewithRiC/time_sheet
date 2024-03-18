@push('title')
    <title>Create Department</title>
@endpush

@if (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')
  
     
@endif



<div id="layoutSidenav_content">
            <main>
                <div class="container pt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Create Department</div>
                
                                <div class="card-body">
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="department_name">Department Name</label>
                                            <input type="text" class="form-control" id="department_name" name="department_name">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="team_members">Team Members</label>
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
                
                                        <button type="submit" class="btn btn-primary">Create Department</button>
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

