@push('title')
    <title>
        Profile Update</title>
@endpush


@if (session()->get('designation') == 'ADMIN')
    @include('layouts.adminheader')
@elseif (session()->get('designation') == 'MANAGER')
    @include('layouts.managerheader')
@elseif (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif


<div id="layoutSidenav_content">
    <main>
        <div class="container rounded bg-white  p-1">
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if($user->image === null)
                          <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        @else  
                         <img class="rounded-circle mt-5" width="150px" src="{{ asset($user->image) }}" >
                         
                        
                        @endif 
                        <span class="font-weight-bold"> <span class="text-black-50">
                               {{ $user->name }}
                            </span>

                            <span> </span>
                    </div>
                </div>

                <form action="{{ url('/') }}/profileupdate/{{ session()->get('id') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 border-right">
                        <div class="p-2 py-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Update</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                        class="form-control" name="name" placeholder="first name"
                                        value="{{ $user->name }}">
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                        class="form-control" name="phone" placeholder="enter phone number"
                                        value="{{ $user->phone }}"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                        class="form-control" name="address" placeholder="enter address"
                                        value="{{ $user->address }}"></div>

                                <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                        class="form-control" name="pin" placeholder="enter pincode"
                                        value="{{ $user->pin }}"></div>
                                <div class="col-md-12"><label class="labels">State</label><input type="text"
                                        class="form-control" name="state" placeholder="enter state"
                                        value="{{ $user->state }}"></div>

                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                        class="form-control" name="email" placeholder="enter email id"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="col-md-12"><label class="labels">Qualification</label><input type="text"
                                        class="form-control" name="qualification" placeholder="qualification"
                                        value="{{ $user->qualification }}">
                                </div>
                                <div class="col-md-12"><label class="labels">Designation </label><input type="text"
                                        class="form-control" name="designation" placeholder="Designation"
                                        value="{{ $user->designation }}">
                                </div> <br>


                                <div class="col-md-12"><label class="labels">Years of Experience </label><input
                                        type="text" class="form-control" name="yoe"
                                        placeholder="experience in years" value="{{ $user->yoe }}">
                                </div> <br>
                                <div class="col-md-12"><label class="labels">Additional Details</label><input
                                        type="text" class="form-control" name="details"
                                        placeholder="additional details" value="{{ $user->details }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="labels">Upload Profile</label>
                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                    @if ($user->image)
                                        <input type="hidden" name="previous_image" value="{{ $user->image }}">
                                        <span>{{ $user->image }}</span> <!-- Display the filename -->
                                    @else
                                        <span>No file uploaded</span> <!-- Or display a message if no file is uploaded -->
                                    @endif
                                </div>
                                
                                



                            </div>


                        </div>
                    </div>


                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>

                </form>
            </div>
        </div>

    </main>

</div>
</div>

@include('layouts.footer')
