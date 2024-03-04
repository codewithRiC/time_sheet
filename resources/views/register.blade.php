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

                            <form action="{{ url('/') }}/register" method="post">
                                @csrf
                                <div class="form-group">

                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Enter you name">
                                        <span class="text-danger">
                                            @error('name')
                                                {{$message }}
                                                
                                            @enderror
                                        </span>
                                </div>

                                <div class="form-group col-md-12">

                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="Email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{$message }}
                                                
                                            @enderror
                                        </span>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Password">
                                            <span class="text-danger">
                                                @error('password')
                                                    {{$message }}
                                                    
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <input name="confirmpassword" type="password" class="form-control"
                                            id="confirmpassword" placeholder="Confirm Password">
                                            <span class="text-danger">
                                                @error('confirmpassword')
                                                    {{$message }}
                                                    
                                                @enderror
                                            </span>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <input name="phone" type="number" class="form-control" id="phone"
                                            placeholder="Phone ">
                                            <span class="text-danger">
                                                @error('phone')
                                                    {{$message }}
                                                    
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <select name="designation" id="designation" class="form-control">
                                            <option selected>Designation</option>
                                            <option>ADMIN</option>
                                            <option>MANAGER</option>
                                            <option>EMPLOYEE</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('designation')
                                                {{"select a designation" }}
                                                
                                            @enderror
                                        </span>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <select name="securityQuestion" class="form-control" id="securityQuestion">
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

                                        <input name="securityAnswer" type="text" class="form-control"
                                            id="securityAnswer">
                                            <span class="text-danger">
                                                @error('securityAnswer')
                                                    {{$message }}
                                                    
                                                @enderror
                                            </span>
                                    </div>

                                </div>
                               
                                    <button type="submit" class="_btn_04">Register</button>
                                
                            </form>




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
