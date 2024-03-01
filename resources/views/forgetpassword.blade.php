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
                                <img src="assets/images/logo3.png">
                            </div>
                            
                                    <h3 class="text-center">Password Recovery</h3>
                           
                                <div class="form-group ">

                                    <select class="form-control" id="securityQuestion">
                                        <option value="" selected disabled>Select a question...</option>
                                        <option value="What is your mother's maiden name?">What is your mother's
                                            maiden name?</option>
                                        <option value="What is the name of your first pet?">What is the name of your
                                            first pet?</option>
                                        <option value="In what city were you born?">In what city were you born?
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group " id="securityAnswerGroup" style="display: none;">

                                    <input type="text" class="form-control" id="securityAnswer">
                                </div>

                            

                         

                            <div class="checkbox form-group">
                               
                                <a href="{{ route('login') }}">Back To Login</a>
                            </div>

                            <div class="form-group">
                                
                                    <a href="{{ route('resetpassword') }}"><div class="_btn_04">Submit </div></a>
                               
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Function to toggle display of security answer input based on selected question
        document.getElementById('securityQuestion').addEventListener('change', function() {
            var securityAnswerGroup = document.getElementById('securityAnswerGroup');
            if (this.value !== '') {
                securityAnswerGroup.style.display = 'block';
            } else {
                securityAnswerGroup.style.display = 'none';
            }
        });
    </script>

</body>

</html>
