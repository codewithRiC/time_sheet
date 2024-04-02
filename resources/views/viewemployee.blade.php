@push('title')
    <title>View Employee</title>
@endpush

@if (session()->get('designation')=="ADMIN")
@include('layouts.adminheader')
@elseif (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')   
     
@endif


<div id="layoutSidenav_content">
    <main>
        <fieldset disabled>
        <div class="container rounded bg-white mt-5 mb-2 ms-4">
            <div class="row">
                <div class="col-md-3 border-right">


                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if($user->image === null)
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                      @else  
                       <img class="rounded-circle mt-5" width="150px" src="{{ asset($user->image) }}" >
                       
                      
                      @endif 
                        <span class="font-weight-bold">
                            {{ $user->name }}

                        </span>
                        <span> {{ $user->email }} </span>
                        <span>{{ 'ID:' }}
                            @if (session()->get('designation') == 'ADMIN')
                                {{ 'ADM' }}-{{ $user->id }}
                            @elseif (session()->get('designation') == 'MANAGER')
                                {{ 'MAN' }}-{{ $user->id }}
                            @elseif (session()->get('designation') == 'EMPLOYEE')
                                {{ 'EMP' }}-{{ $user->id }}
                            @endif

                        </span>
                    </div>
                </div>
                
                <div class="col-md-5 border-right">
                    <div class="p-3 py-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Employee Profile</h4>
                        </div>

                        
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    class="form-control" name="name" value="{{ $user->name }}"></div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control" name="phone" value="{{ $user->phone }}"></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                    class="form-control" name="address" value="{{ $user->address }}"></div>

                            <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                    class="form-control" name="pin" value="{{ $user->pin }}"></div>
                            <div class="col-md-12"><label class="labels">State</label><input type="text"
                                    class="form-control" name="state" value="{{ $user->state }}"></div>

                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                    class="form-control" name="email" value="{{ $user->email }}"></div>
                            <div class="col-md-12"><label class="labels">Qualification</label><input type="text"
                                    class="form-control" name="qualification" value="{{ $user->qualification }}"></div>
                        </div>
                        


                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="col-md-12"><label class="labels">Designation </label><input type="text"
                                class="form-control" name="designation" value="{{ $user->designation }}">
                        </div> <br>

                        <div class="col-md-12"><label class="labels">Years of Experience</label><input type="text"
                                class="form-control" name="yoe" value="{{ $user->yoe }}">
                        </div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                                class="form-control" name="details" value="{{ $user->details }}"></div>
                                <div class="d-flex justify-content-center">        
                                         <a href="{{ route('employeeupdate') }}"><button class="btn btn-primary mt-5 ">Back</button></a>   
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
