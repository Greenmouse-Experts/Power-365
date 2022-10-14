<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{URL::asset('assets/images/logo.jpg')}}" />
    <title>{{config('app.name')}} - Login</title>
    <link rel="stylesheet" href="{{URL::asset('assets/css/subreg.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/997b229808.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/734378a53a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-timeout").fadeTo(500, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 11000);
    </script>
</head>

<body class="login-body">
    <div id='loader'>
        <div class="loader-inner">
            <div class="loading-content"></div>
        </div>
    </div>
    <!--header of the login form-->
    <header class="shadow-sm basic-bg py-3">
        <div class="container login-head">
            <div class="row">
                <div class="col login-img">
                    <a href="/"><img src="{{URL::asset('assets/images/boldLogo.png')}}" alt="{{config('app.name')}}" /></a>
                </div>
            </div>
        </div>
    </header>
    <!--main body of the login form-->
    <main class="login-form-body">
        <div class="container">
            <div class="login-form bg-white position-relative">
                <!-- top avatar -->
                <div class="avatar">
                    <i class="fa-solid fa-user fa-3x text-primary"></i>
                </div>
                <div>
                    <h3 class="mb-0 mt-2">Welcome</h3>
                    <p class="p-0 opacity-50">Login to your {{config('app.name')}} Account</p>
                </div>
                <!--the login form-->
                <div class="mt-4">
                    @includeIf('layouts.error_template')
                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf
                        <div class="login-input">
                            <label for="email">Email or Phone Number</label>
                            <div class="login-input-inner mt-3">
                                <i class="fa-solid fa-user px-2"></i>
                                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Enter your email adress" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="login-input">
                            <div class="row mt-2 pass mt-5">
                                <div class="col">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col text-end forget-p my-0 py-0">
                                    <p>
                                        <a href="{{route('forget')}}" class="text-danger px-2">Forgot Password?</a>
                                    </p>
                                </div>
                            </div>
                            <div class="login-input-inner mt-0">
                                <i class="fa-solid fa-lock px-2"></i>
                                <input type="password" name="password" id="pass" class="@error('password') is-invalid @enderror" placeholder="Enter your password" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <i class="fa-regular fa-eye ps-2" id="eye" onclick="Seepassword()"></i>
                                <i class="fa-solid fa-eye-slash" id="cancel" onclick="Hidepassword()"></i>
                            </div>
                        </div>
                        <div class="login-input continue">
                            <button class="btn basic-bg text-white px-4 w-100" type="submit">
                                Login
                            </button>
                        </div>
                        <div class="py-2">
                            Don't have an account yet?
                            <a href="{{route('subscribe')}}" class="text-danger px-2">Sign up Now!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{URL::asset('assets/js/main.js')}}"></script>
    <script>
        $(function() {
            $("form").submit(function() {
                $('#loader').show();
            });
        });
    </script>
</body>

</html>