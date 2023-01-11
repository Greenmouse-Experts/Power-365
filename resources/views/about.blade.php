@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part about-hero">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
    <div class="container ab-text">
        <div class="ab-text-inner">
            <h1>About Us</h1>
        </div>
    </div>
</div>
<!--section for what we do -->
<section class="section wwd-section">
    <div class="container">
        <div class="row ">
            <div class="row wwd-text align-self-center">
                <div class="wwa-div col-lg-6">
                    <h2>About Us</h2>
                    <p>
                        The Power-365 Entrepreneural Show was developed by a global team of innovative minds and was founded in the entrepreneural City of Lagos, a Nigerian commercial nerve centre.
                    </p>
                    <p>Power-365 is a forum for African entrepreneurs seeking long-term success on local and international levels. We follow innovative models in our attempt to create a better society for everyone. We exist to help entrepreneurs surmount difficult business hurdles.</p>
                </div>
                <div class="wwd-div col-lg-6">
                    <h2>Our Beliefs & Core Values</h2>
                    <div class="why-list d-flex my-0 py-0">
                        <div class="">
                            <p class="py-0 my-2">
                                We believe that businesses and ideas that will positively
                                influence economic growth need to be supported for dreams to
                                be transformed into a profitable reality.
                            </p>
                            <p>
                                Customer Satisfaction, Service, Provision, Adherence to the
                                Rule of Law, and Conventional Customer Relationship are our <span class="fw-bold">Core Values</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--transforming ideas section-->
<section class="section t-ideas-section">
    <div class="container">
        <div class="t-idea justify-content-evenly">
            <div class="t-ideas aim left">
                <div>
                    <h4>Our Aim</h4>
                    <p>
                        To be a veritable means of support for businesses lacking access
                        to sustainable funding.
                    </p>
                </div>
            </div>
            <div class="t-ideas aim left">
                <h4>Our Mission</h4>
                <p>
                    To contribute our quota towards the push for economic stability
                    through developing stable and self-sustaining structures that aid
                    economic growth.
                </p>
            </div>
            <div class="t-ideas vision left">
                <div>
                    <h4>Our Vision</h4>
                    <p>
                        To ease the difficulty being experienced by entrepreneurs in
                        acquiring much-needed business credit facilities.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center" id="provide">
        <div class="col-lg-6 our-body">
            <div class="ourwork-text">
                <h3>Our Eco-system</h3>
                <p class="my-1">
                    Our ecosystem includes both business stakeholders and applicants.
                    We intend to ease the difficulties experienced by startups and
                    SMEs and to offer value to our partners, concerned stakeholders,
                    and targeted beneficiaries.
                </p>
            </div>
            <div class="ourwork-text mt-4">
                <h3>A Showing of Technologically-Driven Innovation</h3>
                <p class="my-1">
                    The Power-365 programme will showcase notable advancements in
                    Technology. It will highlight exploits in the Tech industries and
                    will help with funding where necessary.
                </p>
            </div>
        </div>
        <div class="col-lg-6 gx-0 our-work-img">
            <img src="{{URL::asset('assets/images/wwdo-img.png')}}" alt="" width="100%" />
        </div>
    </div>
</section>
<!-- our e-team section -->
<section class="section e-team2 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="{{URL::asset('assets/images/e-team.png')}}" alt="e-team" width="100%" />
            </div>
            <div class="col-lg-6 e-team-head">
                <h3 class="head-text">We Understand</h3>
                <p class="pt-2">
                    That the competition is fierce outside, and we all work as one
                    huge family toward a shared vision of success.
                </p>
                <h3 class="head-text mt-4">Remember</h3>
                <p class="pt-2">
                    Our concentration is on Africa, and solving entrepreneurial
                    problems is our core mission.
                </p>
            </div>
        </div>
    </div>
</section>
<!--section for history-->
<section class="section history-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 e-team order-lg-2">
                <h2 class="mb-4">Our e-Team</h2>
                <p>
                    Our e-Team is made up of highly skilled professionals with experience in different fields. They will educate, guide, advise, and also monitor the progress of the businesses of the beneficiaries.
                </p>
                <p>
                    Those who receive investment will be enlightened on the proper usage and efficient management of funds provided to them by the company. Such businesses will be provided with structural designs (through our educational platforms) to aid effective business management.
                </p>
                <p>
                Selected entrepreneurs will also be assisted in business registration with the Corporate Affairs Commission (CAC) and other business regulatory bodies in order to provide their businesses with a corporate identity. 
                    <!-- <a href="/#me2" class="text-decoration-none">
                        <span class="text-danger">ME2 rule</span></a>. -->
                </p>
            </div>
            <div class="col-lg-6 history-col">
                <h2 class="">Brief History</h2>
                <p class="mb-4 fw-bold">Our inception: 1st August 2022.</p>
                <p>
                    Idiongo Nelson created the African Tech-Entrepreneurship programme
                    called Power-365 to help entrepreneurs realise the possibilities
                    that come with their businesses and ideas, and to provide
                    solutions to some of the most obvious problems facing contemporary
                    business startups.
                </p>
                <p>
                    We believe that only those who have experienced similar challenges
                    through their rich vein of knowledge would know best how to tackle
                    such challenges and their possible consequences in ways that would
                    be generally beneficial.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection