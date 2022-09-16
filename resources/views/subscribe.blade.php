<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="" />
    <title>{{config('app.name')}} - Subscribe</title>
    <link rel="stylesheet" href="{{URL::asset('css/subreg.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/997b229808.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/734378a53a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!--subscription form for power365-->
    <div class="container-fluid form-box">
        <div class="row dual-box">
            <!--the ads-part div-->
            <!--the ads-part div-->
            <div class="ads-part col-lg-6"></div>
            <!--the form-part div-->
            <!--the form-part div-->
            <div class="form-part col-lg-6 form-part">
                <div class="logo">
                    <a href="#"><img src="{{URL::asset('images/logo1.jpg')}}" alt="" /></a>
                </div>
                <div class="head-text">
                    <h4 class="text-center">
                        SUBSCRIBE TO THE POWER-365 ENTREPRENEURIAL SHOW.
                    </h4>
                </div>
                <!--the input-form starts-->
                <div>
                    @includeIf('layouts.error_template')
                    <form method="POST" action="{{ route('post.subscribe') }}">
                        @csrf
                        <div class="input-box">
                            <label for="fname">First Name</label>
                            <div class="input">
                                <i class="fa-solid fa-user"></i><input type="text" name="first_name" placeholder="First Name" required />
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="lname">Last Name</label>
                            <div class="input">
                                <i class="fa-solid fa-user"></i><input type="text" name="last_name" placeholder="Last Name" required />
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="e">Email Address</label>
                            <div class="input">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="e" type="email" name="email" placeholder="Email Address" required />
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="email">Confirm Email Address</label>
                            <div class="input">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="email" type="email" name="email_confirmation" placeholder="Confirm Email Address" required />
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="phone">Phone Number</label>
                            <div class="input">
                                <input id="phone" type="tel" name="phone_number" max="11" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="input-box d-flex align-items-start pt-3">
                            <input type="checkbox" name="i_agree" class="w-auto me-3 mt-2" required />
                            <p>
                                By clicking the subscribe button, you agree to our general
                                terms and conditions and the ethical rules of the
                                <span>Power365</span> Entreprenuerial Show.
                            </p>
                        </div>
                        <div>
                            <button class="btn btn-primary w-100 fw-bold">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>