@extends('layouts.main')

@push('title')
    <title>Manager</title>
@endpush  

  
    

@section('main-section')
   
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
                    <a class="nav-link text-dark" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-dark"></i></div>
                        Manager Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading text-dark">Departments</div>
                   

                    <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear text-dark"></i></div>
                        Employee
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-dark" href="layout-static.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus text-dark"></i></div>
                                Create Employee
                            </a>

                            <a class="nav-link text-dark" href="layout-static.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users-rectangle text-dark"></i></div>
                                Create Department
                            </a>

                            <a class="nav-link text-dark" href="layout-static.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-wrench text-dark"></i></div>
                                View/Edit Department
                            </a>

                            <a class="nav-link text-dark" href="layout-sidenav-light.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear text-dark"></i></div>
                                View/Edit Employee
                            </a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-bars-progress text-dark"></i></div>
                        Projects
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           
                            <a class="nav-link text-dark" href="layout-static.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus text-dark"></i></div>
                                Create Projects
                            </a>    

                            <a class="nav-link text-dark" href="layout-sidenav-light.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-plus text-dark"></i></div>
                                Create Tasks
                            </a>

                            <a class="nav-link text-dark" href="layout-static.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-share text-dark"></i></div>
                                Assigning Tasks
                            </a>
                            <a class="nav-link text-dark" href="layout-sidenav-light.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sliders text-dark"></i></div>
                                View/Edit Tasks
                            </a>
                            <a class="nav-link text-dark" href="layout-sidenav-light.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bars text-dark"></i></div>
                                View/Edit Projects
                            </a>
                        </nav>
                    </div>
                  
                    <div class="sb-sidenav-menu-heading text-dark">Reports</div>
                    <a class="nav-link text-dark" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area text-dark"></i></div>
                        Project wise Report Generation
                    </a>
                    <a class="nav-link text-dark" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table text-dark"></i></div>
                        Employee wise Report Generation
                    </a>
                </div>
            </div>
           
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Warning Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
       
    </div>
</div>
@endsection