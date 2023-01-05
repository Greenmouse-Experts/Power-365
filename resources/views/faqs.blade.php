@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
        @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<section class="section-faq-head">
    <div class="section faq-head-main text-center">
        <h1>Frequently Asked Questions</h1>
        <p>Got a question and need answers ? Lets help</p>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">

            <div class="">
                <div class="accordion accordion-flush row justify-content-between" id="accordionFlush">
                    <div class="col-lg-6 padx-4">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    What is the {{config('app.name')}} Entrepreneurial Show?
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    The {{config('app.name')}} Entrepreneurial Show is an audio-visual programme that provides seed funding in the form of capital investment for budding entrepreneurs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Where is your head office located?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    3rd floor, Polystar Building, Marwa Bus-stop, Lekki Phase 1.
                                    Lagos, Nigeria. 23401 Postal Code.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Is the company a registered entity?
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">Yes!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    What is the Eligible Age for Application?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">18 years and above.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    Must I have a skill/idea/business/product before I can
                                    apply to the Show?
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">Yes!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    How do I register for {{config('app.name')}}?
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    To register, you must first apply to the programme.
                                    Kindly visit our website at
                                    <span class="text-danger">www.power365es.com</span> and
                                    follow the procedures.
                                </div>
                            </div>
                        </div>
                        <!-- new -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                    How long does it take to apply?
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Approximately five (5) minutes. Once you have finished the
                                    registration process, it could take up to 48 hours for your
                                    account to be verified.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                    How much is the application fee?
                                </button>
                            </h2>
                            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">NGN 1,825.00</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                                    How long will my application fee last?
                                </button>
                            </h2>
                            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">365-Days.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEleven" aria-expanded="false" aria-controls="flush-collapseEleven">
                                    For how long will I be Active in the Show?
                                </button>
                            </h2>
                            <div id="flush-collapseEleven" class="accordion-collapse collapse" aria-labelledby="flush-headingEleven" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">261-Days.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThirteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThirteen" aria-expanded="false" aria-controls="flush-collapseThirteen">
                                    Can I pay my application fee installmentally, like every
                                    six months?
                                </button>
                            </h2>
                            <div id="flush-collapseThirteen" class="accordion-collapse collapse" aria-labelledby="flush-headingThirteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    No, the system only accepts full payment.
                                </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFourteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFourteen" aria-expanded="false" aria-controls="flush-collapseFourteen">
                                    How do I pay the application fee?
                                </button>
                            </h2>
                            <div id="flush-collapseFourteen" class="accordion-collapse collapse" aria-labelledby="flush-headingFourteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    You can use a MasterCard, Verve, or Visa credit or debit
                                    card to pay for your application on our website through
                                    Paystack.
                                </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFifteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFifteen" aria-expanded="false" aria-controls="flush-collapseFifteen">
                                    What should I do if an outside team contacts me and wants to
                                    charge me more money to apply?
                                </button>
                            </h2>
                            <div id="flush-collapseFifteen" class="accordion-collapse collapse" aria-labelledby="flush-headingFifteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Any information that is not provided on our website should
                                    be ignored completely.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 padx-4">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSixteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSixteen" aria-expanded="false" aria-controls="flush-collapseSixteen">
                                    I have not received an email to confirm my registration?
                                </button>
                            </h2>
                            <div id="flush-collapseSixteen" class="accordion-collapse collapse" aria-labelledby="flush-headingSixteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Please double-check your entered information (email and
                                    password) and complete all of the registration procedures
                                    required. Additionally, we ask that you check your spam or
                                    junk mail folders. Make sure your mailbox has adequate room
                                    to accommodate new emails.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeventeen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeventeen" aria-expanded="false" aria-controls="flush-collapseSeventeen">
                                    What language will the customer service respond to me in?
                                </button>
                            </h2>
                            <div id="flush-collapseSeventeen" class="accordion-collapse collapse" aria-labelledby="flush-headingSeventeen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Our customer service department speaks English.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEighteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEighteen" aria-expanded="false" aria-controls="flush-collapseEighteen">
                                    How much funding do I stand to receive?
                                </button>
                            </h2>
                            <div id="flush-collapseEighteen" class="accordion-collapse collapse" aria-labelledby="flush-headingEighteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                It is determined by your kind of business. 
                                </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNineteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNineteen" aria-expanded="false" aria-controls="flush-collapseNineteen">
                                    Is the Business Support Fund a Loan or Refundable?
                                </button>
                            </h2>
                            <div id="flush-collapseNineteen" class="accordion-collapse collapse" aria-labelledby="flush-headingNineteen" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    It is not a loan, nor is it refundable.
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwenty">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwenty" aria-expanded="false" aria-controls="flush-collapseTwenty">
                                    How do I qualify for the ATM card?
                                </button>
                            </h2>
                            <div id="flush-collapseTwenty" class="accordion-collapse collapse" aria-labelledby="flush-headingTwenty" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    By adhering to the "ME2" rule, which states that your
                                    business must employ at least two people, or by personally
                                    sponsoring a person to pursue a trade or skill.
                                </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentyOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentyOne" aria-expanded="false" aria-controls="flush-collapseTwentyOne">
                                    Must my business be registered before I can participate in
                                    the programme?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentyOne" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentyOne" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    No, you can participate, but once you are selected as a
                                    beneficiary, we automatically provide you with the necessary
                                    financial support to enable you to register your business
                                    irrespective of your geographical location.
                                </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentyTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentyTwo" aria-expanded="false" aria-controls="flush-collapseTwentyTwo">
                                    Can I benefit twice from The {{config('app.name')}} Entrepreneurial Show?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentyTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentyTwo" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">No!</div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentyThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentyThree" aria-expanded="false" aria-controls="flush-collapseTwentyThree">
                                    Can I create multiple profiles?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentyThree" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentyThree" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">No!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentyFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentyFour" aria-expanded="false" aria-controls="flush-collapseTwentyFour">
                                    Is my data safe?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentyFour" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentyFour" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">Yes!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentyFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentyFive" aria-expanded="false" aria-controls="flush-collapseTwentyFive">
                                    Can I use the funding for another business if I am not
                                    comfortable with the business I proposed earlier?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentyFive" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentyFive" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Yes, but you must reach out to our e-Team.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentySix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentySix" aria-expanded="false" aria-controls="flush-collapseTwentySix">
                                    Can I participate from any other country outside Nigeria?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentySix" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentySix" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    Yes! But Nigeria must be the site of your company.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwentySeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwentySeven" aria-expanded="false" aria-controls="flush-collapseTwentySeven">
                                    Can I talk to someone about The {{config('app.name')}} Entrepreneurial
                                    Show?
                                </button>
                            </h2>
                            <div id="flush-collapseTwentySeven" class="accordion-collapse collapse" aria-labelledby="flush-headingTwentySeven" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">Yes!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwelve" aria-expanded="false" aria-controls="flush-collapseTwelve">
                                    Since I am only taking part for 261 days, what happened to
                                    the remaining 104 days?
                                </button>
                            </h2>
                            <div id="flush-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="flush-headingTwelve" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    The 104-days are for your mentoring.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 px-2 text-end">
                    <a href="/contact"><button class="btn btn-outline-primary">
                            Ask Our Team
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection