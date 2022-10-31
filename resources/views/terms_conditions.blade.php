@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<!--section for Terms & conditions-->
<section class="section terms">
    <div class="container pt-5 pb-2">
        <h4>GENERAL TERMS AND CONDITIONS</h4>
        <p class="">
            On behalf of The {{config('app.name')}} Entrepreneurial Show, we welcome you to the
            possibilities that this show presents. We wish you success in your
            entrepreneurial journey. Always remember that Customer Satisfaction,
            Service, Provision, Adherence to the Rule of Law, and Conventional
            Customer Relationship are top priorities in the services we render.
            Therefore, we recommend that you thoroughly read the following Ethical
            Rules.
        </p>
    </div>
    <!--section for Ethical rules-->
    <section class="mt-3">
        <div class="container">
            <h4>Ethical Rules</h4>
            <h5 class="mt-1">Account Creation:</h5>
            <p class="py-0 mb-0 mt-2">
                {{config('app.name')}} is a programme organised exclusively for entrepreneurs who
                are either seeking funds to start a business or expand an existing
                one. Every registered user is required to have any of the following:
                a skill, a product, a business idea, or an existing business.
            </p>
            <h5 class="mt-4">Application:</h5>
            <p class="py-0 mt-3">
                During Application, the payment system we utilise satisfies approved
                technological criteria to prevent fraudulent activities. The
                services are exclusively offered in the local Nigerian currency
                (NGN). In view of the current currency rate, interested residents
                outside Nigeria are obliged to pay the same application fee of
                <span class="fw-bold">NGN 1,825.00</span> as shown on the payment
                portal. {{config('app.name')}} charges just
                <span class="fw-bold">NGN 1,825.00</span> for individual
                application. Any charge added to this amount is a service charge by
                our approved payment platform.
            </p>
            <h5 class="mt-4">
                What to Do If Your Account Is Not Funded Once You Have Successfully
                Applied:
            </h5>
            <p>
                You will be prompted to provide all the transactional information if
                you successfully apply through our website but your account has not
                been funded. This will enable us to fix the issue and maybe sorted
                within eight (8) waiting days.
            </p>
            <h5 class="mt-4">Verification:</h5>
            <p>
                We will only work with verified profiles. A code for your
                verification will therefore be sent to the email or phone number you
                provided while applying. The six-digit code must be entered
                immediately in order to validate your account.
            </p>
            <h5 class="mt-4">Verification Badge:</h5>
            <p>
                The blue tick verification badge shown next to your account name
                confirms that the profile belongs to a specific Active Applicant.
                Every profile that has been validated and is active has a chance of
                being funded.
            </p>
            <h5 class="mt-4">Website Access:</h5>
            <p>
                You may only access and use the website and all other related
                information and resources for your own personal and professional
                development as well as for legitimate business purposes in
                accordance with the terms of this agreement. Our website will be
                accessible to everyone. However, only registered active applicants
                shall have access to all of the website content. We encourage you to
                inform us if you come across any material on the website that you
                feel might violate professional business ethics.
            </p>
            <h5 class="mt-4">Access From Outside Nigeria:</h5>
            <p>
                If an applicant uses our services from a location outside Nigeria,
                that activity is subject to all applicable laws and business
                regulations of the country where that activity is to be applied, and
                it is solely the applicant's responsibility to make sure those
                regulations are fully complied with.
            </p>
            <h5 class="mt-4">Criterion For Selection Qualification:</h5>
            <p>
                Your involvement in all our regular business activities, which will
                be executed on all our platforms, will serve as the criterion for
                selection. You are therefore advised to stay consistent and active.
                Only five (5) applicants will be selected by {{config('app.name')}} every week
                for a live broadcast on our channels to discuss the potential of
                their business ideas. The very fact that you were selected for the
                show does not automatically qualify you for funding. {{config('app.name')}} is a
                competitive platform, thus the judges will evaluate and analyse your
                performance to decide if you qualify for funding or not. You are
                advised to thoroughly prepare your business or idea. Upon
                qualification, the {{config('app.name')}} will provide
                <span>NGN 500,000.00</span> funding for your business or idea.
            </p>
            <h5>Mode of Payment to Beneficiaries:</h5>
            <p>
                Beneficiaries of the business-support fund will be paid during our
                live programmes on our various television channels. Beneficiaries
                cannot choose representatives to receive payment on their behalf. No
                funding will be provided in the month of December. Beneficiaries for
                December will always receive payment in January.
            </p>
            <h5 class="mt-4">Businesses we do not fund:</h5>
            <p>
                No funding shall be provided for businesses involved in gambling,
                drug trafficking, or other similar activities that fall under the
                Prohibition List of the Nigerian Business Regulatory Bodies. We do
                not provide funding for NGOs and individuals that trade in
                cryptocurrencies.
            </p>
            <h5 class="mt-4">Business Registration & Monitoring:</h5>
            <p>
                Beneficiaries must prepare to get their business registered with the
                Corporate Affairs Commission (CAC) and other Business Regulatory
                Bodies. They are duty-bound to grant our
                <a href="/about" class="text-decoration-none text-danger">e-Team</a>
                access to oversee how well they execute their business model.
            </p>
            <h5>Business Mentorship:</h5>
            <p>
                All applicants shall have the right to access a mentor on our
                platform for free. It is a part of their application fee.
            </p>
            <h5 class="mt-4">Business Shareholders:</h5>
            <p>
                {{config('app.name')}} shall have the right to own a 2 to 5% share of equity in
                every business funded by the programme. We intend to use this as a
                means of ensuring that all activities carried out by these
                businesses after funding are those that are geared towards long-term
                success as opposed to general business failure through mismanagement
                of funds.
            </p>
            <h5 class="mt-4">Account Security:</h5>
            <p>
                Endeavour to choose a secure password of your choice during
                registration. You are advised to keep your password secret. If you
                notice any unauthorised use of your password, immediately notify The
                {{config('app.name')}} team at
                <a href="mailto:support@power365es.com" target="_blank" class="text-decoration-none"><span class="text-danger">support@power365es.com</span></a>. If you have forgotten your password, you can have it recovered
                through a procedure provided by the company. You will only receive
                your password recovery link via email. The legal implications and
                accuracy of the information you provide us during registration are
                entirely your responsibility.
            </p>
            <h5 class="mt-4">Multiple Account Creation:</h5>
            <p>
                You are allowed to create only one account. Users who have already
                registered are not permitted to sign up again as new applicants by
                using different email addresses. The company shall terminate a
                user's account, application, and profile for creating multiple
                profiles on the basis of breach of contract.
            </p>
            <h5 class="mt-4">Transfer of Account:</h5>
            <p>
                Applicants are not entitled to transfer their accounts to third
                parties.
            </p>
            <h5 class="mt-4">Termination of Account:</h5>
            <p>
                You may terminate your account by sending a written request to our
                customer care service at
                <a href="mailto:privacy@power365es.com" target="_blank" class="text-decoration-none"><span class="text-danger">privacy@power365es.com</span></a>.
            </p>
            <h5 class="mt-4">Refund Policy:</h5>
            <p>
                Application fees for the {{config('app.name')}} Entrepreneurial Show are
                non-refundable.
            </p>
            <h5>Application Duration and Expiration:</h5>
            <p>
                Your application lasts only for 52 weeks(i.e. 365 days). Its
                expiration period is 261 days from the date your profile was
                validated. The remaining 104 days which include Saturdays and
                Sundays are for free mentoring and are being charged to your
                account. Your account automatically becomes inactive after 261 days
                and loses its verification badge. You are expected to renew your
                application upon expiration.
            </p>
            <h5 class="mt-4">Atm Card From {{config('app.name')}}:</h5>
            <p>
                A Business Debit Card will be issued by {{config('app.name')}} to eligible
                beneficiaries who follow the "<a href="/#me2" class="text-decoration-none"><span class="text-danger">ME2 RULE</span></a>". This card is issued by Providus Bank Plc pursuant to a license
                by MasterCard Asia/Pacific Pte. in partnership with {{config('app.name')}}
                Entrepreneurial Show Limited. By using this card, the holder agrees
                to all the terms and conditions under which it is issued. {{config('app.name')}}
                reserves the right to impose restrictions on each card and also set
                limits on transactions. Upon reaching this limit, the card will
                automatically be deactivated.
            </p>
        </div>
    </section>
</section>
@endsection