@extends('layouts.admin_frontend')

@section('page-content')
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Blog</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <form method="POST" action="{{ route('admin.post.blog')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Post Blog</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="blogTitle" class="form-label text-dark">Title</label>
                                    <input type="text" class="form-control" id="blogTitle" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="form-label text-dark">Description</label>
                                    <textarea id="desc" class="ckeditor form-control" name="description"></textarea>
                                </div>
                                <div class="p-4 border mb-4 form-group">
                                    <label for="demo" class="form-label text-dark">Image</label>
                                    <div>
                                        <input id="demo" type="file" name="image" accept=" image/jpeg, image/png, image/jpg " />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-end mb-1 mb-sm-0">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection