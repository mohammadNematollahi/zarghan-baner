<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">

            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('admin.home')}}"><div class="brand-logo"></div><h2 class="brand-text mb-0">زرقان بنر</h2></a>
            </li>

            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a>
            </li>

        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="navigation-header">
                <span>لینک ها</span>
            </li>

            <li class="nav-item active">
                <a href="{{route("admin.home")}}"><i class="fa fa-home"></i><span class="menu-title">خانه</span></a>
            </li>
            
            <li class="nav-item">

                <a href="#">
                    <i class="ri-find-replace-line"></i>
                    <span class="menu-title">مورد بررسی </span>
                    <span class="badge rounded-pill bg-primary badges-message badges-main-menu"> 99+ </span>
                </a>
                
                <ul class="navigation navigation-main">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary badges-message"> 99+ </span>

                    <li class="nav-item">

                        <a>
                            <i class="ri-file-warning-fill"></i>
                            <span class="menu-title" data-i18n="Todo">تاییده نشده</span>
                        </a>

                        <ul class="navigation navigation-main">
                            <li class="nav-item">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badges-message"> 99+ </span>
                                <a href="{{route('admin.check.article.unverified.market.index')}}"><i class="ri-store-3-fill"></i><span class="menu-title" data-i18n="Todo">بازار</span></a>
                            </li>
                            <li class="nav-item">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badges-message"> 99+ </span>
                                <a href="{{route('admin.check.article.unverified.job.index')}}"><i class="ri-find-replace-fill"></i><span class="menu-title" data-i18n="Calender">کارجویی</span></a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="{{route('admin.check.article.market.index')}}"><i class="ri-store-3-fill"></i><span class="menu-title" data-i18n="Calender">بازار</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.check.article.job.index')}}"><i class="ri-find-replace-fill"></i><span class="menu-title" data-i18n="Calender">کارجویی</span></a>
                    </li>

                </ul>

            </li>

            <li class="nav-item">
                <a href="#">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary badges-message badges-main-menu"> 99+ </span>
                    <i class="ri-bug-line"></i><span class="menu-title">تیکت ها</span>
                </a>
                <ul class="navigation navigation-main">

                    <li class="nav-item">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badges-message"> 99+ </span>
                        <a href="{{route("admin.ticket.important.index")}}">
                            <i class="ri-alarm-warning-fill"></i><span class="menu-title" data-i18n="Calender">مهم</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger badges-message"> 99+ </span>
                        <a href="{{route("admin.ticket.normal.index")}}">
                            <i class="ri-error-warning-fill"></i><span class="menu-title" data-i18n="Calender">معمولی یا نکته دار</span>
                        </a>
                    </li>

                </ul>
            </li>
            
            <ul class="navigation navigation-main">
                <li class="nav-item">

                    <a>
                        <i class="ri-account-circle-line"></i>
                        <span class="menu-title" data-i18n="Todo">اکانت</span>
                    </a>

                    <ul class="navigation navigation-main">
                        
                        <li class="nav-item">
                            <a href="{{route('admin.account.edit')}}"><i class="ri-refresh-fill"></i><span class="menu-title" data-i18n="Calender">بروزرسانی اطلاعات</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.account.change.password')}}"><i class="ri-lock-password-fill"></i><span class="menu-title" data-i18n="Todo">تغییر رمز</span></a>
                        </li>

                    </ul>

                </li>
            </ul>

            <li class="nav-item"><a href="{{route("admin.setting.index")}}"><i class="ri-settings-5-line"></i><span class="menu-title">تنظیمات</span></a></li>

        </ul>
    </div>

</div>

<div>
        
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

</div>