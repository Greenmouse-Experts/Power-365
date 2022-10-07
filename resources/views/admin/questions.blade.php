@extends('layouts.admin_frontend')

@section('page-content')
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Questions</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Questions</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Add Question</h3>
                        </div>
                        <div class="card-body pb-2">
                            <form class="needs-validation was-validated" method="POST" action="{{ route('admin.post.question')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Topic</label>
                                            <select class="form-control mb-4 is-invalid state-invalid" required name="topic"> 
                                                <option value="">Select Topic</option>
                                                @foreach($topics as $topic)
                                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc" class="form-label text-dark">Question</label>
                                            <textarea id="desc" class="is-invalid state-invalid ckeditor form-control" name="question"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Correct Answer</label>
                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Correct Answer" required type="text" name="correct_answer">
                                        </div>
                                        <div class="form-group">
                                            <label>Option Two(2)</label>
                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Option Two" required type="text" name="option_two">
                                        </div>
                                        <div class="form-group">
                                            <label>Option Three(3)</label>
                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Option Three" required type="text" name="option_three">
                                        </div>
                                        <div class="form-group">
                                            <label>Option Four(4)</label>
                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Option Four" required type="text" name="option_four">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </form>
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