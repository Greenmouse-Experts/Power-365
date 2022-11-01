<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{URL::asset('assets/images/logo.jpg')}}" />
    <title>{{config('app.name')}} - Register</title>
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

<body class="reg-page">
    <div id='loader'>
        <div class="loader-inner">
            <div class="loading-content"></div>
        </div>
    </div>
    <main class="container-fluid d-flex">
        <div class="ad-part">
            <div class="m-auto w-75">
                <a href="/"><img src="{{URL::asset('assets/images/boldLogo.png')}}" alt="" width="120%" /></a>
            </div>
            <div class="mt-5 text-center">
                <h5 class="fw-bold">REGISTRATION PORTAL</h5>
                <p class="mt-2">
                    Complete the registration form and get access to {{config('app.name')}} services.
                </p>
            </div>
            <div class="mt-5 text-center">
                <p>Do you have an Account?</p>
                <a href="{{route('login')}}"><button class="btn btn-light px-4">Login</button></a>
            </div>
        </div>
        <!--registration form part-->
        <div class="reg-part">
            <div class="head">
                <header>
                    <div class="logo">
                        <a href="/"><img src="{{URL::asset('assets/images/logo1.png')}}" alt="" width="100%" /></a>
                    </div>
                    <h3 class="text-center my-4">REGISTRATION PORTAL<p /h3>
                </header>
            </div>
            <div class="reg-carousel content carousel slide" data-bs-ride="carousel" id="regform" data-bs-interval="false">
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#regform" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1" class="active"></button>
                    <button type="button" data-bs-target="#regform" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#regform" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#regform" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <!--the carousel containing the forms-->
                    <form method="POST" action="{{ route('post.register', Crypt::encrypt($user->id)) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="carousel-item active" style="margin-top: 25px;">
                            @includeIf('layouts.error_template')
                            <div class="reg-input">
                                <label for="fullname">Full name</label>
                                <p>{{$user->first_name}} {{$user->last_name}}</p>
                            </div>
                            <div class="reg-input">
                                <label for="email">Email Address</label>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="reg-input">
                                <label for="number">Phone Number</label>
                                <p>{{$user->phone_number}}</p>
                                <!-- <input type="tel" name="phone_number" value="{{$user->phone_number}}" required /> -->
                            </div>
                            <div class="reg-input mb-1">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" required />
                            </div>
                            <div class="reg-input">
                                <div class="reg-input-inner">
                                    <label for="gender"> Gender </label>
                                    <select name="gender" class="quarter" required>
                                        <option value="">-- Select An Option --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="reg-input-inner2">
                                    <label for="status"> Status </label>
                                    <select name="status" class="quarter" required>
                                        <option value="">-- Select An Option --</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="reg-input">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="date_of_birth" class="quarter" required />
                            </div>
                            <div class="reg-input">
                                <label for="employ">Employment Status</label>
                                <select name="employment_status" class="quarter" required>
                                    <option value="">-- Select An Option --</option>
                                    <option value="Employed">Employed</option>
                                    <option value="Self-Employed">Self-Employed</option>
                                    <option value="Business Owner">Business Owner</option>
                                    <option value="Not Working">Not Working</option>
                                </select>
                            </div>
                            <div class="reg-input">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="quarter" name="occupation" required />
                            </div>
                            <!-- <div class="reg-input">
                                <label for="opportunity">If given the opportunity, what would you like to
                                    learn?</label>
                                <textarea name="learning_opportunity" class="half" id="opportunity" cols="40" rows="3" required></textarea>
                            </div> -->
                            <div class="text-end mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="next">
                                    Next<i class="px-3 fa-solid fa-forward"></i>
                                </button>
                            </div>
                        </div>
                        <div class="carousel-item" style="margin-top: 25px;">
                            <div class="head-reg">
                                <h5>ADDRESS DETAILS</h5>
                            </div>
                            <div class="reg-input2">
                                <div class="reg-input2-inner">
                                    <label for="cou">Country of Residence</label>
                                    <select name="country_of_residence" id="cou" required>
                                        @foreach ($countries as $country)
                                        <option value="{{$country}}">{{$country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="reg-input2-inner">
                                    <label for="sor">State of Residence</label>
                                    <input type="text" name="state_of_residence" required />
                                </div>
                            </div>
                            <div class="reg-input2">
                                <div class="reg-input2-inner">
                                    <label for="lga">Local Government Area of Residence</label>
                                    <input type="text" name="lga_of_residence" required />
                                </div>
                                <div class="reg-input2-inner">
                                    <label for="city">City</label>
                                    <input type="text" name="city_of_residence" required />
                                </div>
                            </div>
                            <div class="reg-input2">
                                <div class="reg-input2-inner">
                                    <label for="ha">Home Address</label>
                                    <textarea class="py-2" name="home_address" id="" cols="30" rows="2"></textarea>
                                </div>
                                <div class="reg-input2-inner">
                                    <label for="ba">Business Address</label>
                                    <textarea class="py-2" name="business_address" id="" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="reg-input2">
                                <div class="reg-input2-inner">
                                    <label for="sor">State of Origin</label>
                                    <input type="text" name="state_of_origin" required />
                                </div>
                                <div class="reg-input2-inner">
                                    <label for="lgo">Local Government Area of Origin</label>
                                    <input type="text" name="lga_of_origin" required />
                                </div>
                            </div>
                            <div class="reg-input2">
                                <div class="reg-input2-inner">
                                    <label for="bnumber">Business Number</label>
                                    <input type="number" name="business_number" placeholder="Enter Business no" required />
                                </div>
                                <div class="reg-input2-inner">
                                    <label for="wnumber">Whatsapp Number</label>
                                    <input type="number" name="whatsapp_number" placeholder="Enter Whatsapp No" required />
                                </div>
                            </div>
                            <!-- <div class="text-end mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="next">
                                    Next<i class="px-3 fa-solid fa-forward"></i>
                                </button>
                            </div> -->
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="prev">
                                    Prev<i class="px-3 fa-solid fa-backward"></i>
                                </button>
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="next">
                                    Next<i class="px-3 fa-solid fa-forward"></i>
                                </button>
                            </div>
                        </div>
                        <div class="carousel-item" style="margin-top: 25px;">
                            <div class="mt-3 head-reg">
                                <h5>Answer the Following</h5>
                            </div>
                            <div class="question">
                                <label for="question1">Is your business or idea registered?</label>
                                <select name="business_registered" id="question1" required>
                                    <option disabled selected value class="text-light">
                                        -- Select An Option --
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <!-- <option value="Maybe">Maybe</option> -->
                                </select>
                            </div>
                            <div class="question">
                                <label for="question2">Is your business or idea for profit or non-profit?</label>
                                <select name="business_oriented" id="question2" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="I haven't decided yet">I haven't decided yet</option>
                                </select>
                            </div>
                            <div class="question">
                                <label for="question3">Can this business idea generate income now and in the
                                    future?</label>
                                <select name="business_generate_income" id="question3" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Maybe">Maybe</option>
                                </select>
                            </div>
                            <div class="question">
                                <label for="question4">
                                    At what stage is your business currently?
                                </label>
                                <select name="business_stage" id="question4" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Idea Stage">Idea Stage</option>
                                    <option value="Start-up Stage">Start-up Stage</option>
                                    <option value="Growth Stage">Growth Stage</option>
                                    <option value="Expansion Stage">Expansion Stage</option>
                                    <option value="Maturity Stage">Maturity Stage</option>
                                </select>
                            </div>
                            <div class="question">
                                <label for="question5">
                                    Which of the following areas of intellectual property
                                    ownership best applies to your business or idea?
                                </label>
                                <select name="business_areas" id="question5" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Copyright">Copyright</option>
                                    <option value="Trademark">Trademark</option>
                                    <option value="Patent">Patent</option>
                                    <option value="All of the Above">All of the Above</option>
                                    <option value="None of the Above">None of the Above</option>
                                </select>
                            </div>
                            <div class="question">
                                <label for="question6">
                                    What type of business entity best fits your kind of business
                                    or idea?
                                </label>
                                <select name="business_kind" id="question6" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="Public Corperation">Public Corperation</option>
                                    <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
                                    <option value="Partnership">Partnership</option>
                                </select>
                            </div>
                            <!-- <div class="text-end mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="next">
                                    Next<i class="px-3 fa-solid fa-forward"></i>
                                </button>
                            </div> -->
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="prev">
                                    Prev<i class="px-3 fa-solid fa-backward py-1"></i>
                                </button>
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="next">
                                    Next<i class="px-3 fa-solid fa-forward"></i>
                                </button>
                            </div>
                        </div>
                        <div class="carousel-item" style="margin-top: 25px;">
                            <div class="question">
                                <label for="question7">
                                    How much would you require to kickstart or upscale your
                                    business or idea?
                                </label>
                                <select name="business_amount" id="question7" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="₦100,000">₦100,000</option>
                                    <option value="₦200,000">₦200,000</option>
                                    <option value="₦300,000">₦300,000</option>
                                    <option value="₦400,000">₦400,000</option>
                                    <option value="₦500,000">₦500,000</option>
                                </select>
                            </div>
                            <!-- <div class="question">
                                <label for="question8">
                                    How would you like your business to be financed?
                                </label>
                                <select name="business_financed" id="question8" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="By Loan">By Loan</option>
                                    <option value="Personal Money or Power365 Entreprenuerial Show">
                                        Personal Money or {{config('app.name')}} Entreprenuerial Show
                                    </option>
                                    <option value="Equity">Equity</option>
                                    <option value="Giveaway">Giveaway</option>
                                    <option value="Grants">Grants</option>
                                </select>
                            </div> -->
                            <div class="question">
                                <label for="question9">
                                    Are you ready to invest your time in this business?
                                </label>
                                <select name="business_time" id="question9" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="question">
                                <label for="question10"> Asset = ? + ? </label>
                                <select name="asset" id="question10" required>
                                    <option disabled selected value>
                                        -- Select An Option --
                                    </option>
                                    <option value="Liability + Equity">Liability + Equity</option>
                                    <option value="Liability + Liquidity">Liability + Liquidity</option>
                                    <option value="Equity + Profit">Equity + Profit</option>
                                    <option value="Equity + Liquidity">Equity + Liquidity</option>
                                    <option value="Profit + Loss">Profit + Loss</option>
                                </select>
                            </div>
                            <div class="reg-input2" style="margin-left: 0px;">
                                <div class="reg-input2-inner">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="pass" placeholder="Password" required />
                                    <i class="fa-regular fa-eye ps-2" style="margin-left: -2rem;" id="eye" onclick="Seeregpassword()"></i>
                                    <i class="fa-solid fa-eye-slash" style="margin-left: -2rem;" id="cancel" onclick="Hideregpassword()"></i>
                                    <div class="text-danger">The password must be at least 8 characters.</div>
                                </div>
                            </div>
                            <div class="reg-input2" style="margin-left: 0px;">
                                <div class="reg-input2-inner">
                                    <label for="passwordconfirm">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="cpass" placeholder="Confirm Password" required />
                                    <i class="fa-regular fa-eye ps-2" style="margin-left: -2rem;" id="eyeconfirm" onclick="Seeconfirmregpassword()"></i>
                                    <i class="fa-solid fa-eye-slash" style="margin-left: -2rem; display: none;" id="cancelconfirm" onclick="Hideconfirmregpassword()"></i>
                                    <div class="text-danger">The password must be at least 8 characters.</div>
                                </div>
                            </div>
                            <div class="question register-text">
                                <p>
                                    By clicking the Register button, you agree to our
                                    <a href="/terms-conditions">General Terms and Conditions</a> and the <a href="/terms-conditions">Ethical Rules</a> of the
                                    {{config('app.name')}} Entreprenuerial Show
                                    and confirm that you have read our
                                    <a href="/privacy-policy">Privacy Policy</a> to learn how we collect, use,
                                    and share data.
                                </p>
                            </div>
                            <!-- <div class="text-center">
                                <button class="btn basic-bg text-white w-100" type="submit">Register</button>
                            </div> -->
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn basic-bg text-white px-4" type="button" data-bs-target="#regform" data-bs-slide="prev">
                                    Prev<i class="px-3 fa-solid fa-backward py-1"></i>
                                </button>
                                <button class="btn basic-bg text-white px-4" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        // see password
        function Seeregpassword() {
            let input = document.getElementById("pass");
            let eye = document.getElementById("eye");
            let cancel = document.getElementById("cancel")


            if (input.type === "password") {
                input.type = "text"
                eye.style.display = "none"
                cancel.style.display = "inline-block"
            } else {
                input.type = "password"
                eye.style.display = "inline-block"
                cancel.style.display = "none"
            }

        }
        // hide password
        function Hideregpassword() {
            let input = document.getElementById("pass");
            let eye = document.getElementById("eye");
            let cancel = document.getElementById("cancel");

            if (input.type === "text") {
                input.type = "password"
                eye.style.display = "inline-block"
                cancel.style.display = "none"
            }
        }

        // see password
        function Seeconfirmregpassword() {
            let input = document.getElementById("cpass");
            let eye = document.getElementById("eyeconfirm");
            let cancel = document.getElementById("cancelconfirm")


            if (input.type === "password") {
                input.type = "text"
                eye.style.display = "none"
                cancel.style.display = "inline-block"
            } else {
                input.type = "password"
                eye.style.display = "inline-block"
                cancel.style.display = "none"
            }

        }
        // hide password
        function Hideconfirmregpassword() {
            let input = document.getElementById("cpass");
            let eye = document.getElementById("eyeconfirm");
            let cancel = document.getElementById("cancelconfirm");

            if (input.type === "text") {
                input.type = "password"
                eye.style.display = "inline-block"
                cancel.style.display = "none"
            }
        }

        $(function() {
            $("form").submit(function() {
                $('#loader').show();
            });
        });
    </script>
</body>

</html>