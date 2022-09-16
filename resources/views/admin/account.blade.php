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
                    <h1 class="page-title">Account</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
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
                                            <div class="m-0 p-1 rounded hrem-6" style="width: 6rem; align-items: center; font-size: 2rem; background:#0d6efd; color: #fff; display: flex; justify-content: center;">{{ ucfirst(substr(Auth::user()->last_name, 0, 1)) }}</div>        
                                            @endif
                                        </div>
                                        <div class="ms-4">
                                            <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                            <p class="text-muted mb-2">{{Auth::user()->email}}</p>
                                            <a href="mail-inbox.html" class="btn btn-secondary btn-sm">{{Auth::user()->phone_number}}</a>
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
                                            <li><a href="#accountSettings" class="active show" data-bs-toggle="tab">Account Settings</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="accountSettings">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="form-horizontal" method="POST" action="{{ route('admin.account.update.profile',  Crypt::encrypt(Auth::user()->id))}}">
                                                    @csrf
                                                        <div class="mb-4 main-content-label">Update Profile</div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="fname" class="form-label">First Name</label>
                                                                    <input type="text" class="form-control" id="fname" name="first_name"  value="{{Auth::user()->first_name}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="lname" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" id="lname" name="last_name"  value="{{Auth::user()->last_name}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="pno" class="form-label">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="pno" name="phone_number" value="{{Auth::user()->phone_number}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group float-end">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-info my-1" type="submit">Update Profile</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form class="form-horizontal" method="POST" action="{{ route('admin.account.upload.photo',  Crypt::encrypt(Auth::user()->id))}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="mb-4 main-content-label">Upload New Photo</div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="photo" class="form-label">Photo</label>
                                                                    <input type="file" class="form-control" id="photo" placeholder="Photo" name="photo" required>
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
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('admin.account.update.password',  Crypt::encrypt(Auth::user()->id))}}">
                                            @csrf
                                                <div class="mb-4 main-content-label">Reset Your Password</div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="npassword" class="form-label">New Password</label>
                                                            <input type="password" class="form-control" id="npassword" name="new_password" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="cnpassword" class="form-label">Confirm New Password</label>
                                                            <input type="password" class="form-control" id="cnpassword" name="new_password_confirmation" placeholder="Confirm New  Password" required>
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