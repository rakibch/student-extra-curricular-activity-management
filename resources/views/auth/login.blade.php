<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Activity Management System</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('back-end/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back-end/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('back-end/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back-end/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('back-end/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <!-- <a href="index.html"><span>Focus</span></a> -->
                        </div>
                        <div class="login-form">
                            <h4>Login Here</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="{{route('register')}}"> Sign Up Here</a></p>
                                </div>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button"
                                            class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i
                                                class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button"
                                            class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i
                                                class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
