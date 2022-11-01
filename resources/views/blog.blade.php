@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part about-hero">
    <!-- header -->
        @includeIf('layouts.frontend-header')
    <!-- end-header -->
    <div class="container ab-text">
        <div class="ab-text-inner">
            <h1>Blog</h1>
        </div>
    </div>
</div>
<section class="blog-section">
    <div class="container">
        <div class="our-blog">
            <h1 class="m-0">OUR BLOG</h1>
        </div>
        <div class="row bg-light main-blog">
            <div class="col-lg-6">
                <div class="blog-img-head">
                    <img src="{{URL::asset('assets/images/jos.png')}}" alt="" width="100%" height="250" />
                </div>
                <div class="blog-text">
                    <p><span>10 November 2022</span></p>
                    <h6>
                        <a href="#" class="text-decoration-none">Power-365 opens up to public patronage</a>
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet` consectetur adipisicing elit. Tempore
                        voluptatem tenetur architecto culpa praesentium. Modi suscipit
                        incidunt ipsam asperiores ipsa nostrum corrupti porro nemo,
                        magnam totam fugit dolore? Recusandae.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 second-col">
                <div class="row border-bottom pb-3">
                    <div class="col-lg-4 col-5 blog-img">
                        <img src="{{URL::asset('assets/images/jos.png')}}" alt="" width="100%" height="100%" />
                    </div>
                    <div class="col-lg-8 col-7 blog-text">
                        <p class=""><span>9 November 2022</span></p>
                        <p>
                            <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Modi, cumque suscipit! A, pariatur corporis quis illo
                                laborum</a>
                        </p>
                    </div>
                </div>
                <div class="row border-bottom py-3">
                    <div class="col-lg-4 col-5 blog-img">
                        <img src="{{URL::asset('assets/images/jos.png')}}" alt="" width="100%" height="100%" />
                    </div>
                    <div class="col-lg-8 col-7 blog-text">
                        <p class=""><span>9 November 2022</span></p>
                        <p>
                            <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Modi, cumque suscipit! A, pariatur corporis quis illo
                                laborum</a>
                        </p>
                    </div>
                </div>
                <div class="row border-bottom py-3">
                    <div class="col-lg-4 col-5 blog-img">
                        <img src="{{URL::asset('assets/images/jos.png')}}" alt="" width="100%" height="100%" />
                    </div>
                    <div class="col-lg-8 col-7 blog-text">
                        <p class=""><span>9 November 2022</span></p>
                        <p>
                            <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Modi, cumque suscipit! A, pariatur corporis quis illo
                                laborum</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="large-blog">
    <div class="container">
        <div class="row">
            <div class="col-3 border-right">
                <div class="blog-img">
                    <img src="{{URL::asset('assets/images/suscribe.png')}}" alt="" />
                </div>
                <div class="blog-text">
                    <p><span>2 November 2022</span></p>
                    <h6><a href="#">Power-365 iniative on the rise</a></h6>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Nostrum reprehenderit repudiandae voluptatum officiis
                    </p>
                </div>
            </div>
            <div class="col-3 border-right">
                <div class="blog-img">
                    <img src="{{URL::asset('assets/images/suscribe.png')}}" alt="" />
                </div>
                <div class="blog-text">
                    <p><span>2 November 2022</span></p>
                    <h6><a href="#">Power-365 iniative on the rise</a></h6>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Nostrum reprehenderit repudiandae voluptatum officiis
                    </p>
                </div>
            </div>
            <div class="col-3 border-right">
                <div class="blog-img">
                    <img src="{{URL::asset('assets/images/suscribe.png')}}" alt="" />
                </div>
                <div class="blog-text">
                    <p><span>2 November 2022</span></p>
                    <h6><a href="#">Power-365 iniative on the rise</a></h6>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Nostrum reprehenderit repudiandae
                    </p>
                </div>
            </div>
            <div class="col-3">
                <div class="blog-img">
                    <img src="{{URL::asset('assets/images/suscribe.png')}}" alt="" />
                </div>
                <div class="blog-text">
                    <p><span>2 November 2022</span></p>
                    <h6><a href="#">Power-365 iniative on the rise</a></h6>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Nostrum reprehenderit repudiandae
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection