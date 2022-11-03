@extends('layouts.dashboard_frontend')

@section('page-content')
<!--APP-CONTENT OPEN-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Account</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="profile-img-main rounded">
                                            @if(Auth::user()->photo)
                                            <img src="{{Auth::user()->photo}}" alt="img" width="100px" class="m-0 p-1 rounded hrem-6">
                                            @else
                                            <div class="m-0 p-1 rounded hrem-6" style="width: 6rem; align-items: center; font-size: 2rem; background:#2b2a63; color: #fff; display: flex; justify-content: center;">{{ ucfirst(substr(Auth::user()->last_name, 0, 1)) }}</div>        
                                            @endif
                                        </div>
                                        <div class="ms-4">
                                            <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                            <p class="text-muted mb-2">{{Auth::user()->email}}</p>
                                            <a href="#" class="btn btn-primary btn-sm">{{Auth::user()->gender}}</a>
                                            <a href="#" class="btn btn-secondary btn-sm">{{Auth::user()->phone_number}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>
                                            <!-- <li><a href="#editProfile" data-bs-toggle="tab">Edit Profile</a></li> -->
                                            <li><a href="#accountSettings" data-bs-toggle="tab">Account Settings</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="profileMain">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="border-top"></div>
                                    <div class="table-responsive p-5">
                                        <h3 class="card-title">Personal Info</h3>
                                        <table class="table row table-borderless">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td><strong>Full Name :</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email :</strong> {{Auth::user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone Number :</strong> {{Auth::user()->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender :</strong> {{Auth::user()->gender}}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                                <tr>
                                                    <td><strong>Date of Birth :</strong> {{Auth::user()->date_of_birth}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status :</strong> {{Auth::user()->status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Employment Status :</strong> {{Auth::user()->employment_status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Occupation :</strong> {{Auth::user()->occupation}}</td>
                                                </tr>
                                            </tbody>
                                            <!-- <tbody class="col-12 border-top-0 p-0">
                                                <tr>
                                                    <td><strong>If given the opportunity, what would you like to learn?</strong> 
                                                    {{Auth::user()->learning_opportunity}}</td>
                                                </tr>
                                            </tbody> -->
                                        </table>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="table-responsive p-5">
                                        <h3 class="card-title">ADDRESS DETAILS</h3>
                                        <table class="table row table-borderless">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td><strong>Country of Residence :</strong> {{Auth::user()->country_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>State of Residence :</strong> {{Auth::user()->state_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Local Government Area of Residence :</strong> {{Auth::user()->lga_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City :</strong> {{Auth::user()->city_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Home Address :</strong> {{Auth::user()->home_address}}</td>
                                                </tr>
                                                
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td><strong>Business Address :</strong> {{Auth::user()->business_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>State of Origin :</strong> {{Auth::user()->state_of_origin}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Local Government Area of Origin :</strong> {{Auth::user()->lga_of_origin}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Business Number :</strong> {{Auth::user()->business_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Whatsapp Number :</strong> {{Auth::user()->whatsapp_number}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="table-responsive p-5">
                                        <h3 class="card-title">Answered Questions</h3>
                                        <table class="table row table-borderless">
                                            <tbody class="col-12 p-0">
                                                <tr>
                                                    <td><strong>Is your business or idea registered? :</strong> {{Auth::user()->business_registered}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Is your business or idea for profit or non-profit? :</strong> {{Auth::user()->business_oriented}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Can this business idea generate income now and in the future? :</strong> {{Auth::user()->business_generate_income}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>At what stage is your business currently? :</strong> {{Auth::user()->business_stage}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Which of the following areas of intellectual property ownership best applies to your business or idea? :</strong> {{Auth::user()->business_areas}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>What type of business entity best fits your kind of business or idea? :</strong> {{Auth::user()->business_kind}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>How much would you reqiure to kickstart or upscale your business or idea? :</strong> {{Auth::user()->business_amount}}</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td><strong>How would you like your business to be financed? :</strong> {{Auth::user()->business_financed}}</td>
                                                </tr> -->
                                                <tr>
                                                    <td><strong>Are you ready to invest your time in this business? :</strong> {{Auth::user()->business_time}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Asset = ? + ? :</strong> {{Auth::user()->asset}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal">
                                        <div class="row mb-4">
                                            <p class="mb-4 text-17">Personal Info</p>
                                            <div class="col-md-12 col-lg-12 col-xl-6">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">User Name</label>
                                                    <input type="text" class="form-control" id="username" value="Elena Gilbert">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-6">
                                                <div class="form-group">
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" value="Elena">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-6">
                                                <div class="form-group">
                                                    <label for="lastname" class="form-label">last Name</label>
                                                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="Gilbert">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-6">
                                                <div class="form-group">
                                                    <label for="nickname" class="form-label">Nick Name</label>
                                                    <input type="text" class="form-control" id="nickname" placeholder="Nick Name" value="Noa">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-6">
                                                <div class="form-group">
                                                    <label for="designation" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" id="designation" placeholder="Designation" value="Web Designer">
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-4 text-17">Contact Info</p>
                                        <div class="form-group">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="email" placeholder="Email" value="info@noa.in">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="website" class="form-label">Website</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="website" placeholder="Website" value="@spruko.w">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="phoneNumber" class="form-label">Phone</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="phoneNumber" placeholder="phone number" value="+145 541 773">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="address" class="form-label">Address</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="address" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-4 text-17">Social Info</p>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="twitter" class="form-label">Twitter</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="twitter" placeholder="twitter" value="twitter.com/spruko.html">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="facebook" class="form-label">Facebook</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="facebook" placeholder="facebook" value="https://www.facebook.com/Noa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="googlePlus" class="form-label">Google+</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="googlePlus" placeholder="google" value="spruko.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="linkedin" class="form-label">Linkedin</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="linkedin" placeholder="linkedin" value="linkedin.com/in/spruko">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="github" class="form-label">Github</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="github" placeholder="github" value="github.com/sprukos">
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-4 text-17">About Yourself</p>
                                        <div class="form-group ">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label for="biographicalInfo" class="form-label">Biographical Info</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="example-textarea-input" id="biographicalInfo" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-4 text-17">Email Preferences</p>
                                        <div class="form-group mb-0">
                                            <div class="row row-sm">
                                                <div class="col-md-3">
                                                    <label class="form-label">Verified User</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="custom-controls-stacked">
                                                        <label class="ckbox"><input type="checkbox" checked><span> Accept to receive post or page notification emails</span></label>
                                                        <label class="ckbox"><input type="checkbox" checked><span> Accept to receive email sent to multiple recipients</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <div class="tab-pane" id="accountSettings">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('user.account.upload.photo',  Crypt::encrypt(Auth::user()->id))}}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="mb-4 main-content-label">Upload New Photo</div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="photo" class="form-label">Photo</label>
                                                            <input type="file" class="form-control" id="photo" placeholder="Photo" name="photo" required>
                                                            <span class="text-danger">Maximum of 1MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group float-end">
                                                    <div class="row row-sm">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-info my-1" type="submit">Upload New Photo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('user.account.update.password',  Crypt::encrypt(Auth::user()->id))}}">
                                            @csrf
                                                <div class="mb-4 main-content-label">Reset Your Password</div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="npassword" class="form-label">New Password</label>
                                                            <input type="password" class="form-control" id="npassword" name="new_password" placeholder="New Password" required>
                                                            <i class="fa-regular fa-eye ps-2" style="position: absolute; right: 1.5rem; top: 3rem;" id="eye" onclick="SeePassword()"></i>
                                                            <i class="fa-solid fa-eye-slash" style="display:none; position: absolute; right: 1.5rem; top: 3rem;" id="cancel" onclick="HidePassword()"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="cnpassword" class="form-label">Confirm New Password</label>
                                                            <input type="password" class="form-control" id="cnpassword" name="new_password_confirmation" placeholder="Confirm New Password" required>
                                                            <i class="fa-regular fa-eye ps-2" style="position: absolute; right: 1.5rem; top: 3rem;" id="eyeConfirm" onclick="SeeConfirmPassword()"></i>
                                                            <i class="fa-solid fa-eye-slash" style="display:none; position: absolute; right: 1.5rem; top: 3rem;" id="cancelConfirm" onclick="HideConfirmPassword()"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group float-end">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-info my-1" type="submit">Change Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection