@extends('layouts.frontend')

@section('page-content')
<!--header of the index page-->
<div class="top-part">
    <!-- header -->
    @includeIf('layouts.frontend-header')
    <!-- end-header -->
</div>
<!--section for privacy-->
<section class="section privacy">
    <div class="container">
        <h3>Privacy Policy</h3>
        <p class="mt-3">
            We are {{config('app.name')}} Entrepreneurial Show Limited and operate under the
            name "{{config('app.name')}}".
        </p>
        <p>
            We are registered with the Corporate Affairs Commission(CAC) with
            registration number RC 1957446.
        </p>
        <p>
            Our website address is
            <span class="text-danger"> www.power365es.com</span>.
        </p>
        <p>
            Our services are primarily intended to assist individuals with
            business ideas seeking funding. It is also for educational and
            entertainment purposes and shall not be interpreted otherwise. As
            such, we generally process personal data in a direction that will help
            us navigate our services. If you are a subscriber, you should read the
            {{config('app.name')}} Privacy Policy and direct any privacy inquiries to us at
            <a href="mailto:privacy@power365es.com" target="_blank" class="text-decoration-none"><span class="text-danger">privacy@power365es.com</span></a>.
        </p>
        <p>
            This policy describes the information we collect about you and how we
            collect and use the information you share with us.
        </p>
        <h5>1.0 Information Collected:</h5>
        <p>
            As expected, you will be asked to enter your email address, name,
            phone number, and other such information while registering on our
            entrepreneurial platform.
        </p>
        <h5 class="mt-4">2.0 Personal Information Directly Provided:</h5>
        <p>
            (i). Identity Data Consists of the Following: First Name, Last Name,
            and Profile Photo.
        </p>
        <p>
            (ii). Contact Information Include: Your Valid Phone Number, Email
            Address, Residential Address, State of Origin and Local Government
            Area of Origin.
        </p>
        <p>
            (iii) Business Data: Information about your company or business idea
            is contained in this section.
        </p>
        <p>
            (iv). Secondary Data Include: Age, Marital Status, Occupation,
            Employment Status, etc.
        </p>
        <h5 class="mt-4">3.0 How We Use The Information You Provide:</h5>
        <p>
            Any of the information we collect from you may be used in one of the
            following ways:
        </p>
        <p>
            (i). To administer a seminar, promotion, survey, or some other site
            feature.
        </p>
        <p>
            (ii). To send occasional emails: your phone number and email address
            may be used to contact you for information, to handle requests or
            questions, or both.
        </p>
        <p>
            (iii). To maintain and improve the content and functionality of our
            services.
        </p>
        <p>(iv). To develop new programmes and services.</p>
        <p>
            (v). To protect the general security of our IT systems, architecture,
            and networks and to prevent fraud, criminal behavior, or misuse of our
            services.
        </p>
        <h5 class="mt-4">4.0. Unsubscribe:</h5>
        <p>
            If you choose not to receive our emails you can do so by clicking the
            unsubscribe button in any of our emails sent to you.
        </p>
        <h5 class="mt-4">5.0. Links to Other Websites:</h5>
        <p>
            Our website may contain links to other websites, which may have
            privacy policies that differ from ours. We are not responsible for the
            collection, processing, or disclosure of personal information
            collected through other websites. We are also not responsible for any
            information or content contained on such websites. Links to other
            websites are provided solely for educational and entertainment
            purposes. Do note that your usage and browsing on any such website are
            subject to their policies. Please review the privacy notices posted on
            other websites that you may access through our website.
        </p>
        <h5 class="mt-4">6.0 Copyright and other Intellectual property:</h5>
        <p>
            The website includes copyright material, trade names, markings, and
            other proprietary data, as well as texts, images, videos, and graphics
            (collectively referred to as "Content"). Copyright laws, registered
            and unregistered trademarks, and other intellectual property rights
            all protect the contents. Both the Content that was created by
            {{config('app.name')}} and the Content that was chosen, organised, modified, and
            improved using that Content are protected by copyright and other
            intellectual property rights. Except with our company's permission,
            you are not authorised to alter, publish, transmit, take part in the
            transfer or sale of, create derivative works from, or otherwise
            exploit any of the Content, in whole or in part. Take note that
            downloading copyrighted content does not automatically grant you any
            ownership rights.
        </p>
        <h5 class="mt-4">7.0. Cookies:</h5>
        <p>
            "Cookies" are used to make your online experience more user-friendly.
            When you visit our website, we use cookies to help improve your
            experience by enabling the website to remind you during subsequent
            visits. To better understand website usage and assist us in providing
            better services to users, our website collects normal internet log
            information and specifics about visitors' behaviour patterns. Cookies
            are used to collect these data. The used cookies do not allow for user
            identification, and we do not try to track the visitors’ on our
            website. By changing the settings in your web browser, you can choose
            not to accept cookies. However, you might not be able to utilise this
            website's full functionalities if you do so. By using our website, you
            give your consent to the use of cookies.
        </p>
        <h5 class="mt-4">8.0. Data Protection:</h5>
        <p>
            {{config('app.name')}} collects and uses the data you voluntarily provide only
            within the framework of these satisfactory provisions. Your
            information will not be disclosed to a third party. For reference, the
            names, images, and occupations of every beneficiary will be posted on
            our website.
        </p>
        <h5 class="mt-4">9.0. Beneficiaries Portfolio:</h5>
        <p>
            Beneficiaries' names, photos, business names, models, and business
            addresses will all be collected by {{config('app.name')}}. The information will be
            used on our website and social media platforms strictly for
            advertising and reference purposes. {{config('app.name')}} may also decide to use
            the recordings of the show—voice and action—for online promotion and
            publicity.
        </p>
        <h5 class="mt-4">10.0. Eligibility:</h5>
        <p>
            You can apply to the {{config('app.name')}} Entrepreneurial Show if you meet each
            of the conditions given below:
        </p>
        <p>(i). You must be at least 18 years old.</p>
        <p>(ii). Your idea, service, or product must meet a need in Nigeria.</p>
        <p>(iii). Your business is legal.</p>
        <p>(iv). Nigeria serves as the operating base for your business.</p>
        <h5 class="mt-5">11.0. Infractions of the Law:</h5>
        <p>
            Any infringement of this privacy policy should be reported to our data
            protection officer (contact information below) for proper response and
            disciplinary action.
        </p>
        <p>
            Please contact our DPO by email at
            <a href="mailto:privacy@power365es.com" target="_blank" class="text-decoration-none"><span class="text-danger">privacy@power365es.com</span></a>
            if you have any concerns regarding this privacy policy or would like
            to learn more about how to exercise your data protection rights. Our
            data protection officer can be reached at the following address with
            any additional questions.
        </p>
        <p>
            3rd floor, Polystar Building, Marwa Bus-stop, Lekki Phase 1, Lagos,
            Nigeria. 23401 postal code
        </p>
        <h5 class="mt-5">12.0. You have the following rights:</h5>
        <p>
            (i). {{config('app.name')}} works to make it as easy as possible for you to update,
            modify, delete, or restrict the usage of your data.
        </p>
        <p>
            (ii). You can always make changes to your Personal Data directly in
            the account settings section and update your profile photo. Please
            contact us to make the necessary adjustments if you are unable to
            update your data.
        </p>
        <p>
            (iii). Also, get in touch with us if you want to know what Personal
            Data we have about you and if you want it deleted from our systems.
        </p>
        <h5 class="mt-5">
            13.0. You have the right, under certain conditions, to:
        </h5>
        <p>
            (i). Access and obtain a copy of the Personal Data we retain about
            you.
        </p>
        <p>
            (ii). Correct any erroneous Personal Data that is being held for you
            in our system.
        </p>
        <p>(iii). Demand that any personal information about you be deleted.</p>
        <h5 class="mt-5">14.0. Modification:</h5>
        <p>
            If there are any modifications to the regulations, {{config('app.name')}} will
            provide a 7-day notice through your email. The parties' understanding
            of the subject matter covered by this "Agreement" is fully expressed
            in this "Agreement". The sections of this agreement include
            descriptive headings only for convenience.
        </p>
        <p>
            We reserve the right to update the general terms and conditions,
            ethical rules, and privacy policies from time to time.
        </p>
        <h5 class="mt-5">15.0. Consent:</h5>
        <p>
            By applying to our platform, you automatically consent to our
            collection and use of your personal data as outlined therein and agree
            that {{config('app.name')}}'s decision on the selection and qualification of
            beneficiaries are FINAL and cannot be complained against or
            challenged.
        </p>
        <div class="px-2 pt-5">
            <h6 class="fw-bold">Effective Date: Friday, October 20th, 2022.</h6>
        </div>
    </div>
</section>
@endsection