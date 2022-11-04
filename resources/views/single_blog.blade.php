@extends('layouts.frontend')
<style>
    div#social-links ul {
       padding-left: 0;
        list-style: none;
        display: flex!important;
        justify-content: space-between!important;
    }
    div#social-links ul li {
        display: inline-block;
    }          
    div#social-links ul li a {
        padding: 2px;
        margin: 1px;
        font-weight: 400;
        font-size: 2em;
        color: #2b2a63 !important;
    }
</style>
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
                        {!! $shareButtons !!}
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
@endsection