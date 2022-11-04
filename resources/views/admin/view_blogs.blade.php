@extends('layouts.admin_frontend')

@section('page-content')
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">View Blogs</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">All Blogs</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr> 
                                            <th class="border-bottom-0">S/N</th>
                                            <th class="border-bottom-0">Title</th>
                                            <th class="border-bottom-0">Description</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Views</th>
                                            <th class="border-bottom-0">Created At</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    @if($blogs->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="7">No Blog.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($blogs as $key => $blog)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$blog->title}}</td>
                                            <td>{!! html_entity_decode($blog->description) !!}</td>
                                            <td>
                                                <img src="{{$blog->image}}" alt="img" width="100px" class="m-0 p-1 hrem-6">
                                            </td>
                                            <td>{{$blog->views}}</td>
                                            <td>{{$blog->created_at->toDayDateTimeString()}}</td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#view-{{$blog->id}}">View/Edit</button>
                                                    <div class="modal fade" id="view-{{$blog->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <form method="Post" action="{{route('admin.update.blog', Crypt::encrypt($blog->id))}}" enctype="multipart/form-data" style="width: 100%;">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="composemodalTitle">Update Blog</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="blogTitle" class="form-label text-dark">Title</label>
                                                                            <input type="text" class="form-control" id="blogTitle" name="title" value="{{$blog->title}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="desc" class="form-label text-dark">Description</label>
                                                                            <textarea id="desc" class="ckeditor form-control" name="description" value="{{$blog->description}}">{!! html_entity_decode($blog->description) !!}</textarea>
                                                                        </div>
                                                                        <div class="p-4 border mb-3">
                                                                            <label for="demo" class="form-label text-dark">Image</label>
                                                                            <div>
                                                                                <input id="demo" type="file" name="image" accept=" image/jpeg, image/png, image/jpg " />
                                                                            </div>
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#delete-{{$blog->id}}">Delete</button>
                                                <div class="modal fade" id="delete-{{$blog->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <form method="Post" action="{{route('admin.delete.blog', Crypt::encrypt($blog->id))}}" style="width: 100%;">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="composemodalTitle">Delete blog</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <p>Are you sure you want to delete this blog?</p>
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