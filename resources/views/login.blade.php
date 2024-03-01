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
                              </div>
                              
                            <div class="form-group">
                                <input type="email" name="email" class="form-control _ge_de_ol"
                                    placeholder="Enter Email" required="" aria-required="true">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control _ge_de_ol"
                                    placeholder="Enter Password" required="" aria-required="true">
                            </div>

                         

                            <div class="checkbox form-group">
                               
                                <a href="{{ route('forgetpassword') }}">Forgot Password</a>
                            </div>

                            <div class="form-group">
                                
                                    <a href="{{ route('home') }}"><div class="_btn_04">Login </div></a>
                               
                            </div>

                            
                        </div>

                        
                    </div>
                </div>

                <div class="col-lg-6 _lk_de ">

                    <img src="assets/images/prom1.png"  alt="Company pic">



                </div>
            </div>
        </div>
    </section>

</body>

</html>
