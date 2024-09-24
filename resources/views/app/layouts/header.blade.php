<header id="header" class="fixed-top py-3 rounded-bottom rounded-5 mt-2 border-0">
    <div class="container d-flex align-items-center justify-content-evenly">
        <nav id="navbar" class="navbar d-flex justify-content-between">
            <i class="bi bi-list mobile-nav-toggle"></i>
            <!--mobile nav toggle or berger-->

            <ul>
                <li>
                    <a class="scrollto active" href="{{ route('home') }}"><i class="ri-home-4-line"></i>خانه</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ route('home.market.index') }}"><i
                            class="ri-store-2-line"></i>بازار گردی</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ route('home.job.index') }}"><i class="ri-briefcase-2-line"></i>شغل
                        یابی</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#"><i class="ri-article-line"></i>درباره ما</a>
                </li>

                @if(!auth()->user() && !auth()->guard("admin")->user())
                    <li>
                        <a href="#" class="nav-link"><i class="ri-login-box-line"></i>ورود</a>
                    </li>
                @endif

                @if(auth()->user() || auth()->guard("admin")->user())
                    <li>
                        <a href="{{ route("dashboard.home") }}" class="nav-link"><i class="ri-user-line"></i>حساب کاربری</a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- .navbar -->
        <div class="logo">
            <a href="" class="nav-link">عکس لوگو</a>
        </div>
    </div>
</header>
