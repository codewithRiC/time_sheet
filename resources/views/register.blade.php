<!doctype html>
<html lang="en">

<head>
    <title>Register </title>
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
                    <div class="_lk_de ">
                        <div class="form-03-main mt-1 mb-1">
                            <div class="logo mt-2">
                                <img src="assets/images/logo2.png">
                            </div>

                            <form>
                                <div class="form-group">

                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter you name">
                                </div>

                                <div class="form-group col-md-12">

                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <input type="password" class="form-control" id="confirmpassword"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <input type="number" class="form-control" id="phn" placeholder="Phone ">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <select id="designation" class="form-control">
                                            <option selected>Designation</option>
                                            <option>ADMIN</option>
                                            <option>MANAGER</option>
                                            <option>EMPLOYEE</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">

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
                                    <div class="form-group col-md-6" id="securityAnswerGroup" style="display: none;">

                                        <input type="text" class="form-control" id="securityAnswer">
                                    </div>

                                </div>

                            </form>


                            <a href="{{ route('login') }}">
                                <div class="_btn_04">Register</div>
                            </a>

                        </div>




                    </div>


                </div>

                <div class="col-lg-6 _lk_de ">

                    <img src="assets/images/prom3.png" height="582px" width="500px" alt="Company pic">



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
