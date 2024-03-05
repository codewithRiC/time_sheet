<!doctype html>
<html lang="en">

<head>
    <title>Login </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <section class="form-02-main">
        <div class="container pt-4">
            @include('layouts.navigation')
            <div class="row">
                <div class="col-lg-6">
                    <div class="_lk_de">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                            
                        @endif

                        @if (session()->has('successpassword'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('successpassword') }}</p>
                        </div>
                        
                    @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <p>{{ session()->get('error') }}</p>
                            </div>
                            
                        @endif
                        <form action="{{ url('/') }}/login" method="post">
                            @csrf
                            <div class="form-03-main">
                                <div class="logo">
                                    <img src="assets/images/user.png">
                                </div>

                                <div class="form-group">
                                    <label for="designation"></label>
                                    <select class="form-control" name="designation" id="designation">
                                        <option selected>Designation</option>
                                        <option> ADMIN</option>
                                        <option> MANAGER</option>
                                        <option> EMPLOYEE</option>
                                    </select>

                                    <span class="text-danger">
                                        @error('designation')
                                            {{$message }}
                                            
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control _ge_de_ol"
                                        placeholder="Enter Email" required="" aria-required="false">

                                        <span class="text-danger">
                                            @error('email')
                                                {{$message }}
                                                
                                            @enderror
                                        </span>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control _ge_de_ol"
                                        placeholder="Enter Password" required="" aria-required="true">

                                        <span class="text-danger">
                                            @error('password')
                                                {{$message }}
                                                
                                            @enderror
                                        </span>
                                </div>



                                <div class="checkbox form-group">

                                    <a href="{{ route('forgetpassword') }}">Forgot Password</a>
                                </div>

                                <div class="form-group">

                                    <a href="{{ route('home') }}"><button type="submit"
                                            class="_btn_04">Login</button></a>

                                </div>


                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6 _lk_de ">

                    <img src="assets/images/prom1.png" alt="Company pic">



                </div>
            </div>
        </div>
    </section>

</body>

</html>
