<!doctype html>
<html lang="en">

<head>
    @stack('title')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   

    <!-- Bootstrap CSS -->
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
   <link href="{{ url('/') }}/assets/css/styles.css" rel="stylesheet">
   <link href="{{ url('/') }}/assets/css/profile.css" rel="stylesheet">

   <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-white" style="box-shadow: 0px 1px 5px grey">
        <!-- Navbar Brand-->
        <div class="mainhead" style="display: flex">
            <div class="logo ms-3">
                <img src="{{ url('/') }}/assets/images/logo-main.png" alt="iig logo" height="50px">
            </div>
            <div class="mh mt-1">
                <a class="navbar-brand ps-3 text-dark" href="#">IIG TECHNOLOGY</a>
            </div>
        </div>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars text-dark"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-dark"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profileview', ['id' => session()->get('id')]) }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('profileupdate' , ['id' => session()->get('id')]) }}">Edit</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('login') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-white" id="sidenavAccordion" style="box-shadow: 0px 10px 10px grey">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-dark">
                        @if(session()->has('name'))

                        {{ session()->get('name') }}

                        @endif
                    </div>
                    <a class="nav-link text-dark" href="{{ route('employeedashboard', ['id' => session()->get('id')])}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-dark"></i></div>
                        Employee Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading text-dark">Departments</div>
                   

                    <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear text-dark"></i></div>
                        Planning Worksheet
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-dark" href="{{ route('createplan') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days text-dark"></i></div>
                                Create Planning
                            </a>

{{--                            
                            <a class="nav-link text-dark" href="{{ route('planupdate') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-wrench text-dark"></i></div>
                                View/Edit Planning
                            </a> --}}



                            
                        </nav>
                    </div>

                    <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-bars-progress text-dark"></i></div>
                        Projects
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link text-dark" href="{{ route('assigntasksview', ['id' => session()->get('id')]) }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-eye text-dark"></i></div>
                                View Assigned Tasks
                            </a>

                            <a class="nav-link text-dark" href="{{ route('addtimeslot', ['id' => session()->get('id')]) }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-business-time text-dark"></i></div>
                                Add time-slot 
                            </a>
                           

                            <a class="nav-link text-dark" href="{{ route('viewtimeslot',['id'  =>session()->get('id')]) }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cloud-arrow-up text-dark"></i></div>
                                View Time Slot
                            </a>
                            
                            
                        </nav>
                    </div>

                    
                  
                    <div class="sb-sidenav-menu-heading text-dark">Reports</div>
                    <a class="nav-link text-dark" href="{{ route('projectreport') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area text-dark"></i></div>
                        Project wise Report Generation
                    </a>
                    <a class="nav-link text-dark" href="{{ route('employeereportown') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table text-dark"></i></div>
                        Self Report Generation
                    </a>
                </div>
            </div>
           
        </nav>
    </div>