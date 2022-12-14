<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="" />
    <title>{{config('app.name')}} - Continue Registration</title>
    <link rel="stylesheet" href="{{URL::asset('css/subreg.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/997b229808.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/734378a53a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="forget-body">
    <!--header of the login form-->
    <header class="shadow-sm">
        <div class="container login-head">
            <div class="row">
                <div class="col login-img">
                    <a href="#"><img src="/images/logo1.jpg" alt="logo" /></a>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <div class="login-signup d-flex justify-content-end align-items-center">
                        <p class="align-self-center text-opacity-75">New user?</p>
                        <a href="{{route('subscribe')}}"><button class="btn btn-primary py-1">Sign up</button></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--main body of the login form-->
    <main class="login-form-body">
        <div class="container">
            <div class="forget-form">
                <div>
                    <h3 class="mb-0 mt-2">Welcome Back</h3>
                    <p class="p-0 opacity-50">Enter your email to continue registration</p>
                </div>
                <div class="mt-5">
                    @includeIf('layouts.error_template')
                    <form method="POST" action="{{ route('post.continue.register') }}">
                        @csrf
                        <div class="login-input">
                            <label for="email">Email</label>
                            <div class="login-input-inner">
                                <i class="fa-solid fa-user px-2"></i>
                                <input type="email" name="email" id="email" placeholder="Enter your email adress" required />
                            </div>
                        </div>
                        <div class="login-input">
                                <input name="password" value="Password" hidden />
                        </div>
                        <div class="login-input continue">
                            <button class="btn btn-primary px-4" type="submit">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>