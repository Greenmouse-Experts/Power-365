@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
@if($blogs->isEmpty())
<section class="blog-section">
    <div class="container">
        <div class="our-blog">
            <h1 class="m-0">OUR BLOG</h1>
        </div>
        <div class="row bg-light main-blog">
            <div class="blog-text col-lg-6">
                <h4>
                    No Blog Posted.
                </h4>
            </div>
            <div class="col-lg-6">


            </div>
        </div>
    </div>
</section>
@else
<section class="blog-section">
    <div class="container">
        <div class="our-blog">
            <h1 class="m-0">OUR BLOG</h1>
        </div>
        <div class="row bg-light main-blog">
            <div class="col-lg-6 blog-img-head">
                <img src="{{$singleBlog->image}}" alt="" width="90%" height="" />
            </div>
            <div class="blog-text col-lg-6">
                <p><span>{{$singleBlog->created_at->toFormattedDateString()}}</span></p>
                <h4>
                    <a href="{{route('single.blog', Crypt::encrypt($singleBlog->id))}}" class="text-decoration-none">Power-365 opens up to public patronage</a>
                </h4>
                <p id="blog-p">
                {!! html_entity_decode($singleBlog->description) !!}
                </p>
            </div>
            <div class="col-lg-6">


            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-3 border-right blog-news-row border rounded">
                <div class="blog-img">
                    <img src="{{$blog->image}}" alt="" />
                </div>
                <div class="blog-text">
                    <p><span>{{$blog->created_at->toFormattedDateString()}}</span></p>
                    <h6><a href="{{route('single.blog', Crypt::encrypt($blog->id))}}">{{$blog->title}}</a></h6>
                    <p>
                    {!! html_entity_decode($blog->description) !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection