<header class="navbar navbar-expand-lg fixed-top navbar-color navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{URL::asset('assets/images/boldLogo.png')}}" draggable="false" alt="Power-365" width="200" />
        </a>
        <button class="navbar-toggler text-white fa-2x border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <a href="/">
                        <img src="{{URL::asset('assets/images/logo1.png')}}" alt="Power-365" width="180" />
                    </a>
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body row justify-content-between">
                <div class="col-lg-8 nav-style justify-self-center">
                    <ul class="navbar-nav text-dark justify-content-between">
                        <li class="nav-item px-2">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item px-2 d-none">
                            <a class="nav-link" href="/whatwedo">What We Do</a>
                        </li>
                        <li class="nav-item px-2 small-view">
                            <a class="nav-link" href="/#me2">ME2 Rule</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="/beneficiaries">Beneficiaries</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="/faqs">FAQs</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="/contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-button col-lg-3 mx-0 px-0 justify-self-end">
                    <div class="col-lg-4 login-btn">
                         <a class="text-decoration-none" href="/login"><button class="btn fw-bold text-primary d-flex align-items-center">
                                Login<i class="fas fa-angle-double-right px-2"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>