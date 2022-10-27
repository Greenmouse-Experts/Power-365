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
                    <h1 class="page-title">Active Users</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation was-validated" method="POST" action="{{ route('admin.shuffle')}}" >
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                                        <button type="submit" class="btn btn-primary">Shuffle Users</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">All Active Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive export-table">
                                <table id="basic-datatable" class="table table-bordered text-wrap key-buttons border-bottom w-100">
                                    <thead>
                                        <tr> 
                                            <th class="border-bottom-0">S/N</th>
                                            <th class="border-bottom-0">Photo</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Phone Number</th>
                                            <th class="border-bottom-0">Subscription Status</th>
                                            <th class="border-bottom-0">Date Joined</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    @if($active_users->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="6">No Active User.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($active_users as $key => $user)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-center sorting_1">
                                                <div class="avatar avatar-md rounded-circle">
                                                    @if($user->photo)
                                                    <img alt="avatar" class="rounded-circle" src="{{$user->photo}}">
                                                    @else
                                                    <div class="rounded-circle" style="width: 2.5rem; align-items: center; font-size: 1rem; background:#0d6efd; color: #fff; display: flex; justify-content: center;">{{ ucfirst(substr($user->last_name, 0, 1)) }}</div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                {{$user->first_name}} {{$user->last_name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>{{$user->phone_number}}</td>
                                            <td class="bg-success text-white text-center">{{$user->subscription_status}}</td>
                                            <td>{{$user->created_at->toDayDateTimeString()}}</td>
                                            <td>
                                                <a href="{{route('admin.view.edit.user', Crypt::encrypt($user->id))}}" class="btn btn-primary mt-3">View/Edit</a>
                                                <a href="{{route('admin.users.knowledgebase', Crypt::encrypt($user->id))}}" class="btn btn-primary mt-3">Knowledgebase</a>
                                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#sendmessage-{{$user->id}}">Send Message</button>
                                                <div class="modal fade" id="sendmessage-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <form method="Post" action="{{route('admin.message.user', Crypt::encrypt($user->id))}}"  style="width: 100%;">
                                                        @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" value=" {{$user->first_name}} {{$user->last_name}}" readonly>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" placeholder="Subject:" name="subject">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <textarea type="text" class="form-control" placeholder="Message:" name="message" style="height: 300px; width: 500px;"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#delete-{{$user->id}}">Delete</button>
                                                <div class="modal fade" id="delete-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <form method="Post" action="{{route('admin.delete.user', Crypt::encrypt($user->id))}}" style="width: 100%;">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="composemodalTitle">Delete {{$user->first_name}} {{$user->last_name}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <p>Are you sure you want to delete this user?</p>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection