@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
        @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<!-- coming soon section -->
<section class="section">
    <div class="container">
        <div class="text-center">
            <img src="{{URL::asset('assets/images/comingsoon.jpg')}}" alt="" width="70%" />
        </div>
    </div>
</section>
@endsection