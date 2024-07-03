    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        {{-- <div class="brand-logo"></div> --}}
                        <h2 class="brand-text mb-0">AJAR</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>

        @php
            $prefix = Request::route()->getPrefix();
            $route = Route::current()->getName();
        @endphp

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                {{-- <li class="{{ ( request()->is('home') ? 'active' : '' ) }}"><a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">الرئيسيه</span></a>
                </li> --}}

                <li class="{{ ( request()->is('orders') ? 'active' : '' ) }}">
                    <a href="{{ route('orders.index') }}"><i class="feather icon-shopping-cart"></i><span class="menu-item" data-i18n="Analytics">الطلبات</span></a>
                </li>

                <li class="{{ ( request()->is('banners') ? 'active' : '' ) }}">
                    <a href="{{ route('banners.index') }}"><i class="feather icon-bookmark"></i><span class="menu-item" data-i18n="Analytics">البنرات</span></a>
                </li>

                <li class="{{ ( request()->is('adds') ? 'active' : '' ) }}">
                    <a href="{{ route('adds.index') }}"><i class="feather icon-grid"></i><span class="menu-item" data-i18n="Analytics">الاعلانات</span></a>
                </li>

                <li class="{{ ( request()->is('categories') ? 'active' : '' ) }}">
                    <a href="{{ route('categories.index') }}"><i class="feather icon-menu"></i><span class="menu-item" data-i18n="Analytics">الاقسام</span></a>
                </li>

                <li class="{{ ( request()->is('region') ? 'active' : '' ) }}">
                    <a href="{{ route('region.index') }}"><i class="feather icon-map"></i><span class="menu-item" data-i18n="Analytics">المناطق</span></a>
                </li>

                <li class="{{ ( request()->is('city') ? 'active' : '' ) }}">
                    <a href="{{ route('city.index') }}"><i class="feather icon-map-pin"></i><span class="menu-item" data-i18n="Analytics">المدن</span></a>
                </li>

                <li class="{{ ( request()->is('users') ? 'active' : '' ) }}">
                    <a href="{{ route('users.index') }}"><i class="feather icon-users"></i><span class="menu-item" data-i18n="Analytics">العملاء</span></a>
                </li>

                <li class="{{ ( request()->is('inquiry') ? 'active' : '' ) }}">
                    <a href="{{ route('inquiry.index') }}"><i class="feather icon-mail"></i><span class="menu-item" data-i18n="Analytics">عناوين الشكاوى</span></a>
                </li>

                <li class="{{ ( request()->is('inquiry_list') ? 'active' : '' ) }}">
                    <a href="{{ route('inquiry.inquiry_list') }}"><i class="feather icon-x-circle"></i><span class="menu-item" data-i18n="Analytics">الشكاوى</span></a>
                </li>

                <li class="{{ ( request()->is('about') ? 'active' : '' ) }}">
                    <a href="{{ route('about.index') }}"><i class="feather icon-phone"></i><span class="menu-item" data-i18n="Analytics">بيانات التواصل</span></a>
                </li>

                <li class="{{ ( request()->is('black_list') ? 'active' : '' ) }}">
                    <a href="{{ route('black_list.index') }}"><i class="feather icon-x"></i><span class="menu-item" data-i18n="Analytics">القائمه السوداء</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
