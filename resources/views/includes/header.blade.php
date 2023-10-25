<header class="contact_header">
    <div class="container contact_cont_head" style="z-index: 100000; min-width:100%; margin:0;">
        <div class="contact_nav">
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="#"><i class="fa-solid fa-check"></i>{{ __('home.made_in_germany') }}</a></li>
                    <li><a href="#"><i class="fa-solid fa-check"></i>{{ __('home.express_delivery_possible') }}</a>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-check"></i>{{ __('home.firstin_firstout') }}</a></li>
                    <li><a href="#"><i class="fa-solid fa-check"></i>{{ __('home.hotline') }}</a></li>
                </ul>
            </nav>
            @php
                $currentLocale = app()->getLocale();
                $currentPath = Request::path();
                $languagePrefix = $currentLocale . '/';
                //echo $currentPath;
                // Remove existing language prefix if present
                $currentPathWithoutLang = preg_replace('/^(en|de)\//', '', $currentPath);

                if ($currentLocale === 'en') {
                    $currentLanguage = 'English';
                } elseif ($currentLocale === 'de') {
                    $currentLanguage = 'Deutsch';
                } else {
                    $currentLanguage = $currentLocale;
                }

                // Generate URLs for language switches
                $enUrl = 'en/';
                $deUrl = 'de/';
                // Handle case where URL already contains language prefix
                if (strpos($currentPath, $languagePrefix) === 0) {
                    $currentPathWithoutLang = substr($currentPath, strlen($languagePrefix));
                    $enUrl = 'en/' . $currentPathWithoutLang;
                    $deUrl = 'de/' . $currentPathWithoutLang;
                }
            @endphp
            <div class="dropdown">
                <div class="language_p">
                    <h4><a href="{{ __('routes.customer-register') }}"
                            style="text-decoration: none;color: #282828;"><strong>{{ __('home.header_reisteration_link') }}</strong></a>
                    </h4>
                </div>
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $currentLanguage }} <i class="fa-solid fa-language"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url($enUrl) }}">English</a></li>
                    <li><a class="dropdown-item" href="{{ url($deUrl) }}">Deutsch</a></li>
                </ul>
            </div>
        </div>
        <div>
</header>


<header class="lion_nav_wrap">
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav_wrap_dv">
        <div class="container-fluid" style="margin: 0 5.9vw;">
            <div class="lion_nav">
                <a class="logo_img" href="/"><img src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}"
                        alt="empty"></a>
                <div class="admin_btn">
                    <button class="navbar-toggler nav_menu_btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon menu_icon"><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse lion_list" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item  menu_list" style="padding: 0px 10px;">
                                <a class="nav-link" style="font-size: 16px;"
                                    href="javascript:contentViewer(0);">{{ __('home.information_embroidery') }}</a>
                            </li>
                            <li class="nav-item  menu_list" style="padding: 0px 10px;">
                                <a class="nav-link" style="font-size: 16px;"
                                    href="javascript:contentViewer(1);">{{ __('home.prices_embroidery') }}</a>
                            </li>
                            <li class="nav-item menu_list" style="padding: 0px 10px;">
                                <a class="nav-link" style="font-size: 16px;"
                                    href="javascript:contentViewer(2);">{{ __('home.information_vector') }}</a>
                            </li>
                            <li class="nav-item  menu_list" style="padding: 0px 10px;">
                                <a class="nav-link" style="font-size: 16px;"
                                    href="javascript:contentViewer(3);">{{ __('home.price_vector') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="action align-items-center d-flex position-relative float-end" onclick="menuToggle();">
                <div class="profile">
                    @auth
                        @if (Auth::user()->image)
                            <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                style="width: 80px; height:80px; margin:-20px 0px 0 -22px;" />
                        @else
                            <i class="fa-solid fa-circle-user fa-2x" style="margin: 5px 0 0 5px;color:#fff;"></i>
                        @endif
                    @else
                        <a href="{{ __('routes.customer-login') }}">
                            <img src="{{ asset('asset/images/LoginIcon.svg') }}" alt=""
                                style="margin: 5px 0 0 5px;" />
                        </a>
                    @endauth

                </div>
                @auth
                    <div class="menu">
                        <ul>
                            <li>
                                <!-- <a href="#">Change Password</a> -->
                                @if (@auth()->user()->user_type == 'admin')
                                    <a href="{{ __('routes.admin-changepassword') }}">{{ __('home.change_password') }}</a>
                                @elseif(@auth()->user()->user_type == 'freelancer')
                                    <a
                                        href="{{ __('routes.freelancer-changepassword') }}">{{ __('home.change_password') }}</a>
                                @elseif(@auth()->user()->user_type == 'customer')
                                    <a
                                        href="{{ __('routes.customerchange-password') }}">{{ __('home.change_password') }}</a>
                                @elseif(@auth()->user()->user_type == 'employer')
                                    <a
                                        href="{{ __('routes.customerchange-password') }}">{{ __('home.change_password') }}</a>
                                @endif
                            </li>
                            <li>
                                @if (@auth()->user()->user_type == 'admin')
                                    <a href="{{ __('routes.admin-logout') }}">{{ __('home.logout') }}</a>
                                @elseif(@auth()->user()->user_type == 'freelancer')
                                    <a href="{{ __('routes.freelancerlogout') }}">{{ __('home.logout') }}</a>
                                @elseif(@auth()->user()->user_type == 'customer')
                                    <a href="{{ __('routes.customerlogout') }}">{{ __('home.logout') }}</a>
                                @elseif(@auth()->user()->user_type == 'employer')
                                    <a href="{{ __('routes.customerlogout') }}">{{ __('home.logout') }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
