@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<section class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="px-2">
                    <img src="{{$blog->image}}" alt="" width="80%" height="" />
                </div>
                <div class="mt-5 px-2">
                    {!! html_entity_decode($blog->description) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div>
                    <p class="fw-bold">Share this article</p>
                    <div class="w-75">
                        <ul class="list-unstyled justify-content-between d-flex">
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-square-facebook fa-2x basic-text"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram fa-2x basic-text"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-square-twitter fa-2x basic-text"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-tiktok fa-2x basic-text"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-square-youtube fa-2x basic-text"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-50">
                    <p class="fw-bold">Written by</p>
                    <div class="mt-2 d-flex align-items-center">
                        <div class="ps-2">
                            <p class="fw-sbold my-0 py-0">Admin</p>
                            <p class="my-0 py-0">{{$blog->created_at->toFormattedDateString()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sect">
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
@endsection