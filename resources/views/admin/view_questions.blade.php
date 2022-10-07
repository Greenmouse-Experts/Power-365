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
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">All Questions</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">S/N</th>
                                            <th class="border-bottom-0">Topic</th>
                                            <th class="border-bottom-0">Question</th>
                                            <th class="border-bottom-0">Correct Answer</th>
                                            <th class="border-bottom-0">Option Two</th>
                                            <th class="border-bottom-0">Option Three</th>
                                            <th class="border-bottom-0">Option Four</th>
                                            <th class="border-bottom-0">Created At</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    @if($questions->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="4">No question.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($questions as $key => $question)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->name}}</td>
                                            <td>{!! html_entity_decode($question->question) !!}</td>
                                            <td>{{$question->correct_answer}}</td>
                                            <td>{{$question->option2}}</td>
                                            <td>{{$question->option3}}</td>
                                            <td>{{$question->option4}}</td>
                                            <td>{{$question->created_at->toDayDateTimeString()}}</td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#view-{{$question->id}}">Edit</button>
                                                    <div class="modal fade" id="view-{{$question->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <form method="Post" action="{{route('admin.update.question', Crypt::encrypt($question->id))}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="composemodalTitle">Update Question</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label>Topic</label>
                                                                            <select class="form-control is-invalid state-invalid" required name="topic">
                                                                                <option value="{{$question->topic_id}}">{{$question->name}}</option>
                                                                                <option value="">Select Topic</option>
                                                                                @foreach($topics as $topic)
                                                                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="desc" class="form-label text-dark">Question</label>
                                                                            <textarea id="desc" class="is-invalid state-invalid ckeditor form-control" name="question" value="{{$question->question}}">{{$question->question}}</textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>Correct Answer</label>
                                                                            <input class="form-control is-invalid state-invalid" placeholder="Enter Correct Answer" required type="text" name="correct_answer" value="{{$question->correct_answer}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>Option Two(2)</label>
                                                                            <input class="form-control is-invalid state-invalid" placeholder="Enter Option Two" value="{{$question->option2}}" required type="text" name="option_two">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>Option Three(3)</label>
                                                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Option Three" value="{{$question->option3}}" required type="text" name="option_three">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>Option Four(4)</label>
                                                                            <input class="form-control mb-4 is-invalid state-invalid" placeholder="Enter Option Four" value="{{$question->option4}}" required type="text" name="option_four">
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

                                                <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#delete-{{$question->id}}">Delete</button>
                                                <div class="modal fade" id="delete-{{$question->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="sendmessageLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <form method="Post" action="{{route('admin.delete.question', Crypt::encrypt($question->id))}}">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="composemodalTitle">Delete Question</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <p>Are you sure you want to delete this question?</p>
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