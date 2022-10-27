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
                    <h1 class="page-title">Users Knowledgebase</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users Knowledgebase</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Knowledgebase</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive export-table">
                                <table id="file-datatable" class="table table-bordered key-buttons border-bottom w-100">
                                    <thead>
                                        <tr> 
                                            <th class="border-bottom-0">S/N</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Question</th>
                                            <th class="border-bottom-0">Correct Answer</th>
                                            <th class="border-bottom-0">User Answer</th>
                                            <th class="border-bottom-0">Result</th>
                                            <th class="border-bottom-0">Date Submitted</th>
                                        </tr>
                                    </thead>
                                    @foreach($users_knowledgebase as $key => $user_knowledgebase)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user_knowledgebase->first_name}} {{$user_knowledgebase->last_name}}</td>
                                            <td>
                                                {!!$user_knowledgebase->question!!}
                                            </td>
                                            <td>
                                                {{$user_knowledgebase->correct_answer}}
                                            </td>
                                            <td>
                                                {{$user_knowledgebase->answer}}
                                            </td>
                                            <td class="text-success">
                                                {{$user_knowledgebase->result}}
                                            </td>
                                            <td>{{$user_knowledgebase->created_at->toDayDateTimeString()}}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
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