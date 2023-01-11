@extends('layouts.frontend')
<div class="row cookies align-items-center py-2 pb-1 px-4 justify-content-between" style="font-size: 14px !important; position: fixed; bottom: 1px; background-color: #fff; z-index: 100;" id="cookies">
    <div class="col-lg-8">
        <p>
            By clicking “Accept All Cookies” you agree to the storing of cookies
            on your device to enhance site navigation, analyze site usage, and
            assist in our marketing efforts. For more information visit our
            <a href="/privacy-policy" class="text-decoration-none text-primary">Privacy Policy</a>.
        </p>
    </div>
    <div class="col-lg-3 row align-items-center">
        <div class="col-10">
            <button class="btn btn-primary px-3 cookies" onclick="cookies()">
                Accept All Cookies
            </button>
        </div>
        <div class="col-2 text-end">
            <i class="fa-solid fa-xmark pe-4"></i>
        </div>
    </div>
</div>
@section('page-content')
    <!--header of the index page-->
    <div class="top-part">
        <!-- header -->
            @includeIf('layouts.frontend-header')
        <!-- end-header -->
        @includeIf('layouts.frontend-banner')
    </div>
    <!--section to rgister for services-->
    <!-- <section class="section register-sec">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 g-0 sus-col">
            <div>
              <img
                src="/images/suscribe.png"
                alt=""
                width="100%"
                height="300"
              />
            </div>
            <div class="py-5 px-4 bg-white">
              <h3 class="fw-bold py-2">Suscribe</h3>
              <p class="">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                amet sint. Velit officia consequat duis enim velit mollit.
              </p>
              <a href="/suscribe.html"
                ><button class="btn btn-primary my-4 px-4">Suscribe</button></a
              >
            </div>
          </div>
          <div class="col-lg-6 g-0 jos-col">
            <div class="px-4 py-5 bg-white for-large">
              <h3 class="fw-bold py-2">Join Our Show</h3>
              <p class="">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                amet sint. Velit officia consequat duis enim velit mollit.
              </p>
              <a href="/suscribe.html"
                ><button class="btn btn-primary my-4">Join Our Show</button></a
              >
            </div>
            <div>
              <img src="/images/jos.png" alt="" width="100%" height="300" />
            </div>
            <div class="px-4 py-5 bg-white for-mobile">
              <h3 class="fw-bold py-2">Join Our Show</h3>
              <p class="">
                Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                amet sint. Velit officia consequat duis enim velit mollit.
              </p>
              <a href="/suscribe.html"
                ><button class="btn btn-primary my-4">Join Our Show</button></a
              >
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- video section starts-->
    <section class="section video-sec">
        <div class="container position-relative">
            <video width="100%" id="video" controls autoplay>
                <source src="https://res.cloudinary.com/greenmouse-tech/video/upload/v1667561339/power-365/Untitled_v9ofuu.mp4" type="video/mp4" />
            </video>

            <div class="text-center mt-2">
                <a href="{{route('subscribe')}}">
                    <button class="btn basic-bg text-white fs-6 px-4 video-btn fw-bold">
                        Apply
                    </button>
                </a>
            </div>
        </div>
    </section>
    <!--description of the showsection-->
    <section class="section why-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-none d-lg-block why-img">
                    <img src="{{URL::asset('assets/images/logo.gif')}}" alt="hero" class="why-gif" />
                    <img src="{{URL::asset('assets/images/base.png')}}" alt="hero" width="100%" class="why-base" />
                </div>
                <div class="col-lg-6 why-body">
                    <div class="text-col service-sub-head fw-bold position-relative">
                        <h2 class="text-head brown">
                            A Description of <span class="basic-text">Our Show</span>
                        </h2>
                        <div class="overflow-box"></div>
                    </div>
                    <div class="mt-4 text-col">
                        <p>
                            The Power-365 Entrepreneurial Show is an audio-visual programme that provides seed funding in form of Capital Investment for budding entrepreneurs. Entrepreneurship has helped nations tackle economic challenges. Thus, the success of business startups and SMEs will go a long way towards achieving economic stability on a national scale. These are some of the major reasons we have developed a programme that is aimed at resolving the financial difficulties faced by entrepreneurs today.
                        </p>

                        <p class="collapse" id="mores">
                            Starting a business can be quite challenging, especially when you begin with a loan. Loans can be quite difficult for new companies and entrepreneurs to access, not to mention the ever-present pressure on you to succeed or else forfeit your valued collateral. The object here is to provide entrepreneurs with scaling capital investment for their business or idea.
                        </p>
                        <p class="basic-text d-flex align-items-center fw-bold read-more" data-bs-toggle="collapse" data-bs-target="#mores" onclick="Changetext()">
                            <span id="readmore">Read more </span><i class="fa-solid fa-caret-down ps-2" id="readicon"></i>
                        </p>
                    </div>
                    <div class="d-lg-none why-img" id="me2">
                        <img src="{{URL::asset('assets/images/logo.gif')}}" alt="hero" class="why-gif" />
                        <img src="{{URL::asset('assets/images/base.png')}}" alt="hero" width="100%" class="why-base" />
                    </div>
                    <div class="mt-5 text-col">
                        <h2 class="text-head brown mt-1">ME2 Rule</h2>
                        <p>
                            The ME2 Rule states that to qualify for the {{config('app.name')}} Business
                            Debit Card, your Business must employ two people.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section for our services-->
    <section class="section ourservices">
        <div class="container service">
            <div class="opaque">
                <h2 class="text-head m-top">What We Do</h2>
                <div class="service-head d-none">
                    <p>
                        {{config('app.name')}} is a forum for African entrepreneurs seeking long-term
                        success on both the local and international levels.
                    </p>
                </div>
            </div>

            <div class="row services mt-2 justify-content-between position-relative">
                <div class="col-lg-3 right service service-one">
                    <img src="{{URL::asset('assets/images/service-one.png')}}" alt="service-one" />
                    <div class="d-lg-flex ">
                        <i class="fa-solid fa-1 number mt-1 d-none d-lg-block"></i>
                        <p class="text-center my-0">We provide seed funding for entrepreneurs.</p>
                    </div>
                </div>

                <div class="col-lg-3 left service service-two">
                    <img src="{{URL::asset('assets/images/service-two.png')}}" alt="service-two" />
                    <div class="d-lg-flex ">
                        <i class="fa-solid fa-2 number mt-3 d-none d-lg-block"></i>
                        <p class="text-center py-2">
                            We ensure that SMEs (small-scale and medium-sized enterprises)
                            survive the challenge of funding and other business-enhancing
                            facilities.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 right service service-three">
                    <img src="{{URL::asset('assets/images/service-three.png')}}" alt="service-three" />

                    <div class="d-lg-flex">
                        <i class="fa-solid fa-3 number mt-3 d-none d-lg-block"></i>
                        <p class="text-center py-2">
                            We support entrepreneurs in our best capacity to help them achieve
                            their business goals.
                        </p>
                    </div>
                </div>
                <div class="first-arr">
                    <img src="{{URL::asset('assets/images/first-arrow.png')}}" alt="" />
                </div>
                <div class="second-arr">
                    <img src="{{URL::asset('assets/images/second-arr.png')}}" alt="" />
                </div>
            </div>
            <!-- who we are -->
            <div class="weare-sec opaque mt-5">
                <div class="text-head fs-4">
                    <h2 class="text-head mb-2">Who We Are</h2>
                </div>
                <div class="">
                    <p>
                        We are a team of experts with considerable experience in different
                        fields of human endeavour who utilise futuristic and
                        pre-emptive approaches in tackling today’s entrepreneurial
                        challenges.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--section for noteworthy facts-->
    <section class="section description-section">
        <div class="container">
            <div class="notecon">
                <div class="row note-con align-items-center">
                    <div class="col-lg-6 order-lg-2 note-img">
                        <img src="{{URL::asset('assets/images/facts.png')}}" alt="" class="scales " />
                    </div>
                    <div class="col-lg-6 text-cols down order-lg-1">
                        <div class="text-center my-4">
                            <h2 class="mb-4 text-head">
                                Noteworthy Facts About the {{config('app.name')}} Show
                            </h2>
                        </div>
                        <div class="d-flex my-0 py-0">
                            <div class="">
                                <p class="py-0 my-2">
                                    The programme will feature some of Nigeria’s best resource
                                    persons and facilitators who are interested in human capital
                                    development and have carved a niche for themselves in their
                                    various areas of specialisation.
                                </p>
                                <p>
                                    We will follow up on those who get the funding from our
                                    programme by monitoring their businesses and providing them
                                    with mentors if need be.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- line demarkation -->
    <div class="line-decor">
        <img src="{{URL::asset('assets/images/line.png')}}" alt="line" />
    </div>
    <!-- join our community -->
    <section class="section jos-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 text-center">
                    <img src="{{URL::asset('assets/images/join.png')}}" alt="" width="90%" class="scales" />
                </div>
                <div class="col-lg-7 text-cols opaque">
                    <div>
                        <h2 class="text-head my-4">Join the {{config('app.name')}} Community</h2>
                    </div>
                    <div>
                        <p>
                            We invite viewers who share our passion for investing to become
                            a part of our community, especially at-home viewers who wish to
                            lodge investments with individuals or companies featured on our
                            show.
                        </p>
                        <p>
                            {{config('app.name')}} is dedicated to developing new investment avenues in
                            the African startup ecosystem for potential investors from
                            anywhere in the world. To be part of The {{config('app.name')}} Community, you must register and
                            complete the entrance to an annual membership. Once you are registered, you can make an investment request
                            through our website by sending us an email.
                        </p>
                        <p>
                            To register as an investor, kindly send us an email at
                            <a href="mailto:investors@power365es.com" target="_blank" class="text-decoration-none"><span class="text-danger">investors@power365es.com</span></a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- desk of ceo -->
    <section class="section ceo">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-lg-2 carts relative">
                    <div class="ceo-cart rotation cart-1">Ideal</div>
                    <div class="ceo-cart rotation cart-2">Sustainable</div>
                    <div class="ceo-cart rotation cart-3">Beneficial</div>
                    <div class="ceo-cart rotation cart-4">Adventurous</div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <h2 class="my-4 ceo-text">From The Desk of The Founder</h2>
                        <div class="underdiv"></div>
                    </div>
                    <div>
                        <p>
                            Every successful business or organisation we see today began as
                            "an idea". And regardless of how horrible a concept may seem to
                            investors, we believe it deserves some funding. Most ideas do
                            not make it past the pitch stage, probably because they are
                            often perceived as failed projects, even when the metrics used
                            for this evaluation may be inaccurate.
                        </p>
                        <p>
                            So, from the very beginning, we aspired to create a company that
                            harnesses "a good idea" by turning it into a visible, investable
                            business. We want to create a platform that identifies the
                            strength inherent in ideas and the enormous positive influence
                            they might have on business growth if the needed financial
                            support is given. Here we are on The {{config('app.name')}} platform, working
                            relentlessly to ensure that ideas are developed into viable
                            enterprises that can easily source for funding from
                            international business sponsors.
                        </p>
                        <p>
                            To build a business ecosystem that is ideal, sustainable,
                            beneficial, and adventurous, we urge our partners and
                            shareholders to help chart the strategic direction and moral
                            compass of the company.
                        </p>
                        <p class="text-end fw-bold me-4 mt-4 fst-italic">~ Idiongo Nelson.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--line decoration div-->
    <div class="decoration row justify-content-around g-0">
        <div class="decor col-2"></div>
        <div class="decor col-4"></div>
        <div class="decor col-2"></div>
    </div>
    <!--section for subscribe-->
    <section class="section sub-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 newSub">
                    <img src="{{URL::asset('assets/images/news.png')}}" alt="newsletter" draggable="false" width="100%" />
                </div>
                <div class="col-lg-6">
                    <div>
                        <p>NEWSLETTER</p>
                    </div>
                    <div>
                        <h2 class="text-head">Subscribe To Our Newsletter</h2>
                        <p class="subText">
                            Get instant emails from us on recent news and updates.
                        </p>
                    </div>
                    <form action="">
                        <div class="mt-5 subinp">
                            <input type="email" name="email" id="" class="px-3 border-1 py-2 w-100" style="border-radius: 8px; background: inherit" />
                            <label for="email">Your Email Here</label>
                        </div>
                        <div class="mt-4">
                            <button class="btn w-100 text-white py-2" style="border: 1px solid #2b2a63; background: #2b2a63">
                                Suscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection