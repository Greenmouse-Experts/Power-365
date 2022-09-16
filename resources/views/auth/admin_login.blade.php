<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="" />
    <title>{{config('app.name')}} - Login</title>
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
            </div>
        </div>
    </header>
    <!--main body of the forget form-->
    <main class="login-form-body">
        <div class="container">
            <div class="forget-form">
                <div>
                    <h4 class="mb-0 mt-2">Admin Login</h4>
                </div>
                @includeIf('layouts.error_template')
                <form  method="POST" action="{{ route('post.admin.login') }}">
                    @csrf
                    <div class="">
                        <div class="login-input">
                            <label for="email">Email</label>
                            <div class="login-input-inner">
                                <i class="fa-solid fa-user px-2"></i>
                                <input type="email" name="email" id="email" placeholder="Enter your email adress" required />
                            </div>
                        </div>
                        <div class="login-input">
                            <label for="password">Password</label>
                            <div class="login-input-inner">
                                <i class="fa-solid fa-lock px-2"></i>
                                <input type="password" name="password" id="password" placeholder="Enter your password" required />
                            </div>
                        </div>
                    </div>
                    <div class="login-input continue">
                        <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>

</html>