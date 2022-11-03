@extends('layouts.admin_frontend')

@section('page-content')
<!--APP-CONTENT OPEN-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">{{$user->first_name}} {{$user->last_name}}</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
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
                                            @if($user->photo)
                                            <img src="{{$user->photo}}" alt="img" width="100px" class="m-0 p-1 rounded hrem-6">
                                            @else
                                            <div class="m-0 p-1 rounded hrem-6" style="width: 6rem; align-items: center; font-size: 2rem; background:#0d6efd; color: #fff; display: flex; justify-content: center;">{{ ucfirst(substr($user->last_name, 0, 1)) }}</div>        
                                            @endif
                                        </div>
                                        <div class="ms-4">
                                            <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                                            <p class="text-muted mb-2">{{$user->email}}</p>
                                            <a href="#" class="btn btn-primary btn-sm">{{$user->gender}}</a>
                                            <a href="#" class="btn btn-secondary btn-sm">{{$user->phone_number}}</a>
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
                                                    <td><strong>Full Name :</strong> {{$user->first_name}} {{$user->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email :</strong> {{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone Number :</strong> {{$user->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender :</strong> {{$user->gender}}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                                <tr>
                                                    <td><strong>Date of Birth :</strong> {{$user->date_of_birth}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status :</strong> {{$user->status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Employment Status :</strong> {{$user->employment_status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Occupation :</strong> {{$user->occupation}}</td>
                                                </tr>
                                            </tbody>
                                            <!-- <tbody class="col-12 border-top-0 p-0">
                                                <tr>
                                                    <td><strong>If given the opportunity, what would you like to learn?</strong> 
                                                    {{$user->learning_opportunity}}</td>
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
                                                    <td><strong>Country of Residence :</strong> {{$user->country_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>State of Residence :</strong> {{$user->state_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Local Government Area of Residence :</strong> {{$user->lga_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City :</strong> {{$user->city_of_residence}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Home Address :</strong> {{$user->home_address}}</td>
                                                </tr>
                                                
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td><strong>Business Address :</strong> {{$user->business_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>State of Origin :</strong> {{$user->state_of_origin}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Local Government Area of Origin :</strong> {{$user->lga_of_origin}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Business Number :</strong> {{$user->business_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Whatsapp Number :</strong> {{$user->whatsapp_number}}</td>
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
                                                    <td><strong>Is your business or idea registered? :</strong> {{$user->business_registered}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Is your business/idea profit-oriented or non-profit-oriented? :</strong> {{$user->business_oriented}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Can this business idea generate income now and in the future? :</strong> {{$user->business_generate_income}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>At what stage is your business currently? :</strong> {{$user->business_stage}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Which of the following areas of intellectual property ownership best applies to your business or idea? :</strong> {{$user->business_areas}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>What type of business entity best fits your kind of business or idea? :</strong> {{$user->business_kind}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>How much would you reqiure to kickstart or upscale your business or idea? :</strong> {{$user->business_amount}}</td>
                                                </tr>
                                                <!-- <tr>
                                                    <td><strong>How would you like your business to be financed? :</strong> {{$user->business_financed}}</td>
                                                </tr> -->
                                                <tr>
                                                    <td><strong>Are you ready to invest your time in this business? :</strong> {{$user->business_time}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Asset= ? + ? :</strong> {{$user->asset}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="accountSettings">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('user.account.upload.photo',  Crypt::encrypt($user->id))}}" enctype="multipart/form-data">
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
                                            <form class="form-horizontal" method="POST" action="{{ route('user.account.update.password',  Crypt::encrypt($user->id))}}">
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
                                                            <button class="btn btn-info my-1" type="submit">Update Password</button>
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