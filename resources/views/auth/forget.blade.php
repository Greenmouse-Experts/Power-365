<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{URL::asset('assets/images/logo.jpg')}}" />
    <title>{{config('app.name')}} - Forget</title>
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

<body class="forget-body">
    <div id='loader'>
        <div class="loader-inner">
            <div class="loading-content"></div>
        </div>
    </div>
    <!--header of the forget form-->
    <header class="shadow-sm basic-bg py-3">
      <div class="container login-head">
        <div class="row">
          <div class="col login-img">
            <a href="/"><img src="{{URL::asset('assets/images/boldLogo.png')}}" alt="logo" /></a>
          </div>
          </div>
        </div>
      </div>
    </header>
    <!--main body of the forget form-->
    <main class="login-form-body">
        <div class="container">
            <div class="forget-form">
                <div>
                    <h4 class="mb-0 mt-2">Forgot Password?</h4>
                    <p class="pt-1 opacity-50">Please type in the email address or linked to your {{config('app.name')}} account to reset your password.</p>
                </div>
                @includeIf('layouts.error_template')
                <form method="POST" action="{{route('user.forget.password')}}">
                    @csrf
                    <div class="">
                        <div class="login-input">
                            <label for="email">Email Adress</label>
                            <div class="login-input-inner">
                                <i class="fa-solid fa-envelope px-2"></i>
                                <input type="email" name="email" id="email" placeholder="Enter your email adress" required />
                            </div>
                        </div>
                    </div>
                    <div class="login-input">
                        <p>Remebered Password? <a href="{{route('login')}}" class="text-danger">back to login</a></p>
                    </div>
                    <div class="login-input continue">
                        <button class="btn basic-bg text-white px-4" type="submit">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
    <script>
        $(function() {
            $("form").submit(function() {
                $('#loader').show();
            });
        });
    </script>
</body>

</html>