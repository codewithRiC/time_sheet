<!doctype html>
<html lang="en">

<head>
    <title>ForgetPassword </title>
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
                <div class="col-md-12 mb-5 pb-4 mt-4 pt-4">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo">
                                <img src="assets/images/logo4.png">
                            </div>
                            
                                    <h3 class="text-center">Reset Password </h3>
                           
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control _ge_de_ol"
                                            placeholder="Enter New Password" required="" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="confirmpassword" class="form-control _ge_de_ol"
                                            placeholder="Enter Confirm Password" required="" aria-required="true">
                                    </div>
        
        

                            

                         

                            

                            <div class="form-group">
                                
                                    <a href="{{ route('login') }}"><div class="_btn_04">Submit </div></a>
                               
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

</body>

</html>
