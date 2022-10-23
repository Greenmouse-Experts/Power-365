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
                    <h1 class="page-title">{{config('app.name')}} Lab</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lab</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">All Questions</h3>
                        </div>
                        <div class="card-body pb-0">
                            @foreach($questions as $question)
                            <div class="media border br-5 p-4 mb-5 overflow-visible">
                                <div class="media-body overflow-visible">
                                    <div class="br-5">
                                        <h5 class="mt-0" style="display: flex; justify-content: space-between;">{{$loop->iteration}}. {!!$question->question!!} <span class="text-muted fs-12 ms-1">{{$question->created_at->toDateString()}}</span></h5>
                                        <div class="media mt-5 border br-5 p-4 overflow-visible d-sm-flex d-block">
                                            <form action="{{route('user.post.knowledgebase.answer', Crypt::encrypt($question->id))}}" method="post">
                                            @csrf
                                                <div class="media-body overflow-visible br-5">
                                                    <h5 class="mt-0"><input type="radio" name="answer_{{$question->id}}" value="{{$question->option2}}" required/> {{$question->option2}} <h5>
                                                    <h5 class="mt-0"><input type="radio" name="answer_{{$question->id}}" value="{{$question->option3}}" required/> {{$question->option3}} <h5>
                                                    <h5 class="mt-0"><input type="radio" name="answer_{{$question->id}}" value="{{$question->option4}}" required/> {{$question->option4}} <h5>
                                                    <h5 class="mt-0"><input type="radio" name="answer_{{$question->id}}" value="{{$question->correct_answer}}" required/> {{$question->correct_answer}} <h5>
                                                    <button class="badge py-3 px-4 my-1" style="background-color: #0d6efd; color: white;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- CONTAINER END -->
    </div>
</div>
@endsection