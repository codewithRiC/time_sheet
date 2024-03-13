@push('title')
    <title>
        Profile View
    </title>
@endpush

@if (session()->get('designation')=="ADMIN")
    @include('layouts.adminheader')
@elseif (session()->get('designation')=="MANAGER")
    @include('layouts.managerheader')   
@elseif (session()->get('designation')=="EMPLOYEE")
    @include('layouts.employeeheader')       

  
@endif






        <div id="layoutSidenav_content">
            <main>
                
                <div class="container rounded bg-white mt-5 mb-2 ms-4">
                    <div class="row">
                        <div class="col-md-3 border-right">
                              
                          
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <span class="font-weight-bold">
                                    @if (session()->has('name'))
                                        {{ session()->get('name') }}
                                    @endif

                                  
                                </span></span>
                                    @if (session()->has('email'))
                                      {{ session()->get('email') }}
                                    @endif
                                <span> </span>
                            </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                            class="form-control" placeholder="first name" value=""></div>

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

                               
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 py-5">
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
                        </div>
                    </div>
                </div>
        </div>
          @endphp
    </div>
    </main>

    </div>
    </div>

    @include('layouts.footer')

