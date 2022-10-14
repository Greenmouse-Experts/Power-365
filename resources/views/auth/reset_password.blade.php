<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{URL::asset('assets/images/logo.jpg')}}" />
    <title>{{config('app.name')}} - Reset Account Password</title>
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
                    <h4 class="mb-0 mt-2">Reset Password</h4>
                    <p class="pt-1 opacity-50">Before proceeding, please check your email and phone number for a reset password code.</p>
                </div>
                @includeIf('layouts.error_template')
                <form  method="POST" action="{{ route('user.update.password') }}">
                    @csrf
                    <div class="">
                        <div class="login-input">
                            <label for="code">Code</label>
                            <div class="login-input-inner">
                                <input type="text" name="code" id="code" placeholder="Enter code" required />
                            </div>
                        </div>
                        <div class="login-input">
                            <label for="password">New Password</label>
                            <div class="login-input-inner">
                                <input type="password" name="password" id="password" placeholder="Enter New Password" required />
                            </div>
                        </div>
                        <div class="login-input">
                            <label for="password-confirm">Re-Enter New Password</label>
                            <div class="login-input-inner">
                                <input type="password" name="password_confirmation" id="password-confirm" placeholder="Enter Password Confirmation" required />
                            </div>
                        </div>
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