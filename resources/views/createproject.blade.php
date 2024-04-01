@push('title')
    <title>Create Project</title>
@endpush

@if (session()->get('designation')=="ADMIN")
@include('layouts.adminheader')
@elseif (session()->get('designation')=="MANAGER")
@include('layouts.managerheader')   
     
@endif



<div id="layoutSidenav_content">
            <main>
                <div class="container rounded bg-white  p-1">
                    <div class="row">
                        {{-- <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <span class="font-weight-bold"> <span class="text-black-50">
                                    @if(session()->has('name'))
            
                                    {{ session()->get('name') }}
            
                                    @endif</span>
                                
                                <span> </span>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="p-2 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-centre p-3 " style="color:rgb(14, 14, 129);font-weight:700;font-size:30px;">ADD PROJECT</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="text"
                                            class="form-control" placeholder="Project Name" value=""></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input
                                            type="text" class="form-control" placeholder="enter phone number"
                                            value=""></div>
                                    <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                            class="form-control" placeholder="enter address line 1" value=""></div>

                                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                            class="form-control" placeholder="enter address line 2" value=""></div>
                                    <div class="col-md-12"><label class="labels">State</label><input type="text"
                                            class="form-control" placeholder="enter address line 2" value=""></div>

                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                            class="form-control" placeholder="enter email id" value=""></div>
                                    <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                            class="form-control" placeholder="education" value=""></div>
                                </div>

                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                        type="submit">Save Profile</button></div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="p-2 py-3">
                                <div class="col-md-12"><label class="labels">Designation </label><input
                                    type="text" class="form-control" placeholder="Designation" value="">
                                </div> <br>


                                <div class="col-md-12"><label class="labels">Years of Experience </label><input
                                        type="text" class="form-control" placeholder="experience" value="">
                                </div> <br>
                                <div class="col-md-12"><label class="labels">Additional Details</label><input
                                        type="text" class="form-control" placeholder="additional details"
                                        value=""></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
        </div>
    </div>
    </main>

    </div>
    </div>

    @include('layouts.footer')
