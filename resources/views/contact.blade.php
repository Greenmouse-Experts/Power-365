@extends('layouts.frontend')
<link rel="stylesheet" href="{{URL::asset('assets/css/subreg.css')}}" />

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
        @includeIf('layouts.frontend-header')
    <!-- end-header -->
    <div class="hero-section">
        <div class="text-center contact-head-text">
            <h2><span>Hello !</span> how can we help ?</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-evenly box-main">
        <div class="col-lg-3 contact-box">
            <i class="fa-solid fa-phone-volume fa-2x pb-2 text-primary"></i>
            <h6>Phone Lines</h6>
            <p class="mt-3"><a href="tel:+2348165300908" style="text-decoration: none;">+234 816 530 0908</a></p>
            <p class><a href="tel:+2347082617683" style="text-decoration: none;">+234 708 261 7683</a></p>
        </div>
        <div class="col-lg-3 contact-box">
            <i class="fa-solid fa-envelope-circle-check fa-2x pb-2 text-warning"></i>
            <h6>Email Support</h6>
            <p class="mt-4"><a href="mailto:support@power365es.com" style="text-decoration: none;">support@power365es.com</a></p>
        </div>
        <div class="col-lg-3 contact-box">
            <i class="fa-solid fa-magnifying-glass-location fa-2x pb-2 text-success"></i>
            <h6>Office Address</h6>
            <p>
                3rd floor, Polystar Building, Marwa Bus-stop, Lekki Phase 1,
                Lagos, Nigeria.
            </p>
        </div>
    </div>
</div>
<main class="form-section">
    <div class="container form-con">
        <div class="row form-row">
            <div class="col-lg-6 contact-form">
                <div class="contact-head">
                    <h2>Get in Touch with Us</h2>
                    <p>For email queries please fill in the form below:</p>
                </div>
                <div>
                    <form method="POST" action="/contact-us">
                    @csrf
                        <div class="contact-input">
                            @includeIf('layouts.error_template')
                        </div>
                        <div class="contact-input">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" required placeholder="enter your first name" />
                        </div>
                        <div class="contact-input">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" required placeholder="enter your e-mail" />
                        </div>
                        <div class="contact-input">
                            <label for="pnumber">Phone number<span class="text-danger">*</span></label>
                            <input type="tel" name="phone" required placeholder="enter your phone number" />
                        </div>
                        <div class="contact-input">
                            <label for="subject">Subject<span class="text-danger">*</span></label>
                            <input type="text" name="subject" required placeholder="enter your subject" />
                        </div>
                        <div class="contact-input">
                            <label for="message">Message<span class="text-danger">*</span></label>
                            <textarea name="message" required placeholder="write your message or inquiry here"></textarea>
                        </div>
                        <div class="contact-input">
                            {!! app('captcha')->display() !!}
                        </div>
                        <div class="contact-input">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 form-map gx-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1014756.6903908219!2d2.976542089307389!3d6.535154865265881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf2bae227550d%3A0xe771ad7f1bbe89d6!2sLagos!5e0!3m2!1sen!2sng!4v1639066038889!5m2!1sen!2sng" style="width: 100%; height: 100%" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</main>
@endsection