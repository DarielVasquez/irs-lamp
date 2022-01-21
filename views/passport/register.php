<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <!--Register Form-->
                            <form class="user" action="<?=base_url?>passport-createAccount" method="POST">
                                <div class="form-group">
                                        <input type="text" required class="form-control form-control-user" id="fullName" name="fullName"
                                            placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control form-control-user" id="user" name="user"
                                        placeholder="Username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" required class="form-control form-control-user"
                                            id="pass" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" required class="form-control form-control-user"
                                            id="pass" placeholder="Repeat Password" name="pass">
                                    </div>
                                </div>
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block"/>
                                <hr>
                                <a href="<?=base_url?>" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="<?=base_url?>" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?=base_url?>passport-forgot_password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url?>passport-login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>