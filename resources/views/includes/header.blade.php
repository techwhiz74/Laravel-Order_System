<header class="contact_header">
    <div class="container contact_cont_head" style="z-index: 100000; min-width:100%; padding:0 !important;">
        <div class="contact_nav">
            <nav class="nav">
                <ul class="nav-list">
                    <li>
                        <div></i>{{ __('home.made_in_germany') }}</div>
                    </li>
                    <li>
                        <div></i>{{ __('home.express_delivery_possible') }}</div>
                    </li>
                    <li>
                        <div></i>{{ __('home.firstin_firstout') }}</div>
                    </li>
                    <li>
                        <div></i>{{ __('home.hotline') }}</div>
                    </li>
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
                    @if (auth()->user())
                        <p style="margin-bottom: 0 !important; margin-right:10px;"><a
                                style="text-decoration: none;color: #282828;"><strong>{{ __('home.header_reisteration_link') }}</strong></a>
                        </p>
                    @else
                        <p style="margin-bottom: 0 !important; margin-right:10px;"><a
                                href="{{ __('routes.customer-register') }}"
                                style="text-decoration: none;color: #282828;"><strong>{{ __('home.header_reisteration_link') }}</strong></a>
                        </p>
                    @endif
                </div>

                @auth()
                    @if (auth()->user()->user_type == 'freelancer')
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English <i class="fa-solid fa-language"></i>
                        </button>
                    @elseif(auth()->user()->user_type == 'customer' ||
                            auth()->user()->user_type == 'admin' ||
                            auth()->user()->user_type == 'employer')
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $currentLanguage }} <i class="fa-solid fa-language"></i>
                        </button>
                    @endif
                @else
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $currentLanguage }} <i class="fa-solid fa-language"></i>
                    </button>
                    <ul class="dropdown-menu" id="convert_language">
                        <li><a class="dropdown-item" href="{{ url($enUrl) }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url($deUrl) }}">Deutsch</a></li>
                    </ul>
                @endauth

            </div>
        </div>
        <div>
</header>


<header class="lion_nav_wrap">
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav_wrap_dv">
        <div class="container-fluid" style="margin: 0 6vw; padding:0 !important;">
            <div class="col-4 col-lg-3 col-xl-2">
                <div class="lion_nav">
                    @if (auth()->user())
                        @if (auth()->user()->user_type == 'customer' ||
                                auth()->user()->user_type == 'admin' ||
                                auth()->user()->user_type == 'employer')
                            <a class="logo_img" href="/"><img
                                    src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}" alt="empty"></a>
                        @elseif(auth()->user()->user_type == 'freelancer')
                            <a class="logo_img" href="/en"><img
                                    src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}" alt="empty"></a>
                        @endif
                    @else
                        <a class="logo_img" href="/"><img
                                src="{{ asset('asset/images/lion_werbe_gmbh_logo.webp') }}" alt="empty"></a>
                    @endif
                </div>
            </div>
            <div class="col-6 col-lg-8 col-xl-9">
                @if (auth()->user())
                    @if (auth()->user()->user_type == 'customer')
                        <div class="admin_btn">
                            <button class="navbar-toggler nav_menu_btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon menu_icon"><i class="fa-solid fa-bars"></i></span>
                            </button>
                            <div class="collapse navbar-collapse lion_list" id="navbarSupportedContent">
                                <ul class="navbar-nav mb-2 mb-lg-0 hearder_information">
                                    <li class="nav-item  menu_list">
                                        <a class="nav-link"
                                            href="javascript:contentViewer(0);">{{ __('home.information_embroidery') }}</a>
                                    </li>
                                    <li class="nav-item  menu_list">
                                        <a class="nav-link"
                                            href="javascript:contentViewer(1);">{{ __('home.prices_embroidery') }}</a>
                                    </li>
                                    <li class="nav-item menu_list">
                                        <a class="nav-link"
                                            href="javascript:contentViewer(2);">{{ __('home.information_vector') }}</a>
                                    </li>
                                    <li class="nav-item  menu_list">
                                        <a class="nav-link"
                                            href="javascript:contentViewer(3);">{{ __('home.price_vector') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @elseif(auth()->user()->user_type == 'freelancer' || auth()->user()->user_type == 'admin')
                    @endif
                @else
                    <div class="admin_btn">
                        <button class="navbar-toggler nav_menu_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon menu_icon"><i class="fa-solid fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse lion_list" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0 hearder_information">
                                <li class="nav-item  menu_list">
                                    <a class="nav-link"
                                        href="javascript:contentViewer(0);">{{ __('home.information_embroidery') }}</a>
                                </li>
                                <li class="nav-item  menu_list">
                                    <a class="nav-link"
                                        href="javascript:contentViewer(1);">{{ __('home.prices_embroidery') }}</a>
                                </li>
                                <li class="nav-item menu_list">
                                    <a class="nav-link"
                                        href="javascript:contentViewer(2);">{{ __('home.information_vector') }}</a>
                                </li>
                                <li class="nav-item  menu_list">
                                    <a class="nav-link"
                                        href="javascript:contentViewer(3);">{{ __('home.price_vector') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-2 col-lg-1 col-xl-1">
                <div class="action align-items-center d-flex position-relative float-end" onclick="menuToggle();">
                    <div class="profile">
                        @auth
                            @if (auth()->user()->user_type == 'customer')
                                @if (Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                        style="width: 40px; height:40px;" />
                                @else
                                    <i class="fa-solid fa-circle-user fa-2x" style="color:#fff;"></i>
                                @endif
                            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                                @if (Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                        style="width: 40px; height:40px;" />
                                @else
                                    <i class="fa-solid fa-circle-user fa-2x" style="color:#fff;"></i>
                                @endif
                            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                                @if (Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                        style="width: 40px; height:40px;" />
                                @else
                                    <i class="fa-solid fa-circle-user fa-2x" style="color:#fff;"></i>
                                @endif
                            @elseif(auth()->user()->user_type == 'admin')
                                @if (Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                        style="width: 40px; height:40px;" />
                                @else
                                    <i class="fa-solid fa-circle-user fa-2x" style="color:#fff;"></i>
                                @endif
                            @elseif(auth()->user()->user_type == 'employer')
                                @if (Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image"
                                        style="width: 40px; height:40px;" />
                                @else
                                    <i class="fa-solid fa-circle-user fa-2x" style="color:#fff;"></i>
                                @endif
                            @endif
                        @else
                            <a href="{{ __('routes.customer-login') }}">
                                <img src="{{ asset('asset/images/LoginIcon.svg') }}" alt=""
                                    class="customer_login_icon" />
                            </a>
                        @endauth

                    </div>
                    @auth
                        <div class="menu">
                            <ul>
                                @if (@auth()->user()->user_type == 'admin')
                                    <li>
                                        <a
                                            href="{{ __('routes.admin-changepassword') }}">{{ __('home.change_password') }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ __('routes.admin-change-avatar') }}">{{ __('home.change_avatar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ __('routes.admin-logout') }}">{{ __('home.logout') }}</a>
                                    </li>
                                @elseif(@auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                                    <li>
                                        <a
                                            href="{{ __('routes.freelancer-changepassword') }}">{{ __('home.change_password') }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ __('routes.freelancer-em-change-avatar') }}">{{ __('home.change_avatar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ __('routes.freelancerlogout') }}">{{ __('home.logout') }}</a>
                                    </li>
                                @elseif(@auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                                    <li>
                                        <a
                                            href="{{ __('routes.freelancer-changepassword') }}">{{ __('home.change_password') }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ __('routes.freelancer-ve-change-avatar') }}">{{ __('home.change_avatar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ __('routes.freelancerlogout') }}">{{ __('home.logout') }}</a>
                                    </li>
                                @elseif(@auth()->user()->user_type == 'customer')
                                    <li>
                                        <a
                                            href="{{ __('routes.customerchange-password') }}">{{ __('home.change_password') }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ __('routes.customer-change-avatar') }}">{{ __('home.change_avatar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ __('routes.customerlogout') }}">{{ __('home.logout') }}</a>
                                    </li>
                                @elseif(@auth()->user()->user_type == 'employer')
                                    <li>
                                        <a href="{{ __('routes.customerlogout') }}">{{ __('home.logout') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
<script>
    $(document).ready(function() {
        $('.navbar-nav .nav-link').on('click', function() {
            $('#navbarSupportedContent').collapse('hide');
        });
        $(document).on('click', function(event) {
            // Check if the click is outside the navbar
            if (!$(event.target).closest('.navbar-collapse').length) {
                // Click is outside the navbar, so collapse it
                $('#navbarSupportedContent').collapse('hide');
            }
        });

        // Prevent clicks inside the navbar from triggering the above document click event
        $('.navbar-collapse').on('click', function(event) {
            event.stopPropagation();
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.menu').length) {
                // Click is outside the menu, so close the menu
                $('.menu').hide();
            }
        });

        $('.action').on('click', function(event) {
            event
                .stopPropagation(); // Prevent clicks inside the action from triggering the document click event
        });
    });
</script>
