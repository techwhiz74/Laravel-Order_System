<div id="wrapper">



    <div id="sidebar-wrapper">
        <ul class="sidebar-nav" style="margin-left:75px">
            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup1"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/reel-duotone.svg') }}" style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>
                                    {{ __('home.order_standard') }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_green" id="em_freelancer_green" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/New.svg') }}" style="width: 38px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>NEUE<br>AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_green" id="ve_freelancer_green" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/New.svg') }}" style="width:38px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>NEUE<br>AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="admin_customer_list" id="admin_customer_list1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/users-duotone.svg') }}" style="width:38px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>KUNDENLISTE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup2"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/reel-duotone.svg') }}" style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_express') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_yellow" id="em_freelancer_yellow" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Process.svg') }}" style="width: 24px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>AUFTRÄGE IN ARBEIT</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_yellow" id="ve_freelancer_yellow" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Process.svg') }}" style="width: 24px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>AUFTRÄGE IN ARBEIT</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="admin_add_customer" id="admin_add_customer1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/user-plus-duotone.svg') }}" style="width:38px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>KUNDE ERFASSEN</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup3"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/vector-polygon-duotone.svg') }}"
                                    style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_standard') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_red" id="em_freelancer_red" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Done.svg') }}" style="width: 24px;" />
                            </div>

                            <div style="height: 40%;padding: 3px 0; ">
                                <p>ABGESCHLOSSENE AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_red" id="ve_freelancer_red" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Done.svg') }}" style="width: 24px;" />
                            </div>

                            <div style="height: 40%;padding: 3px 0;">
                                <p>ABGESCHLOSSENE AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup1"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/reel-duotone.svg') }}" style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>
                                    {{ __('home.order_standard') }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup4"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/vector-polygon-duotone.svg') }}"
                                    style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_express') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_blue" id="em_freelancer_blue" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Changes.svg') }}" style="width: 40px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>AUFTRÄGE ÄNDERUNGEN</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_blue" id="ve_freelancer_blue" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/Changes.svg') }}" style="width: 40px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>AUFTRÄGE ÄNDERUNGEN</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup2"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/reel-duotone.svg') }}" style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_express') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="view_order_popup" id="view_order_popup1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/list-radio-duotone.svg') }}" style="width: 32px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>ALLE<br>AUFTRAGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_all" id="em_freelancer_all" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/All.svg') }}" style="width: 32px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>ALLE<br>AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="freelancer_all" id="ve_freelancer_all" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/All.svg') }}" style="width: 32px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>ALLE<br>AUFTRÄGE</p>
                            </div>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup3"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/vector-polygon-duotone.svg') }}"
                                    style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_standard') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="profile_popup" id="profile_popup1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/address-card-duotone.svg') }}"
                                    style="width: 37px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.customer_master_data') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
                <li style="margin-right: 50px;">
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="order_form_em_standard_popup" id="order_form_em_standard_popup4"
                            class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/vector-polygon-duotone.svg') }}"
                                    style="width: 29px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.order_express') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="login_information" id="login_information1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/users-between-lines-duotone.svg') }}"
                                    style="width: 41px;" />
                            </div>

                            <div style="height: 40%;padding: 3px;">
                                <p>{{ __('home.employee_access') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
            @endif

            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="customer_parameters_em" id="customer_parameters_em1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/grip-sharp-solid.svg') }}" style="width: 28px;" />
                            </div>

                            <div style="height: 40%;padding: 3px 0;">
                                <p>{{ __('home.customer_parameters_em_sidebar') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
            @endif
            @if (auth()->user()->user_type == 'customer')
                <li>
                    <div class="sidebar-div" type="button">
                        <div lion-pop-id="customer_parameters_ve" id="customer_parameters_ve1" class="lion_pop_btn">
                            <div style="height: 54%;margin-bottom: 5px;padding: 0;">
                                <img src="{{ asset('asset/images/grip-vertical-sharp-solid.svg') }}"
                                    style="width: 20px;" />
                            </div>

                            <div style="height: 40%;padding: 3px 0;">
                                <p>{{ __('home.customer_parameters_ve_sidebar') }}</p>
                            </div>
                        </div>

                    </div>
                </li>
            @elseif (auth()->user()->user_type == 'admin')
            @endif

        </ul>
    </div>


    <div id="profile_popup" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'admin')
                <x-admin.admin-profile />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.freelancer-profile />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.freelancer-profile />
            @elseif(auth()->user()->user_type == 'customer')
                <x-user.customer-profile />
            @elseif(auth()->user()->user_type == 'employer')
                <x-user.employer-profile />
            @endif
        </div>
    </div>

    <div id="view_order_popup" class="lion_popup_wrrpr">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'admin')
                {{-- <x-admin.vieworders /> --}}
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                {{-- <x-freelancer.vieworders /> --}}
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                {{-- <x-freelancer.vieworders /> --}}
            @elseif(auth()->user()->user_type == 'customer')
                <x-user.vieworders />
            @elseif(auth()->user()->user_type == 'employer')
                {{-- <x-user.employer-vieworders /> --}}
            @endif
        </div>
    </div>

    <div id="order_form_em_standard_popup" class="lion_popup_wrrpr">
        <div class="lion_popup_dv">

            @if (auth()->user()->user_type == 'customer')
                <x-user.order_form_em_standard />
            @elseif (auth()->user()->user_type == 'admin')
                <x-admin.admin_order_form />
            @endif
        </div>
    </div>
    <div id="customer_parameters_em" class="lion_popup_wrrpr" style="overflow-y: hidden;">
        <div class="lion_popup_dv">

            @if (auth()->user()->user_type == 'customer')
                <x-user.customer_parameters_em />
            @endif
        </div>
    </div>
    <div id="customer_parameters_ve" class="lion_popup_wrrpr" style="overflow-y: hidden;">
        <div class="lion_popup_dv">

            @if (auth()->user()->user_type == 'customer')
                <x-user.customer_parameters_ve />
            @endif
        </div>
    </div>
    <div id="login_information" class="lion_popup_wrrpr">
        <div class="lion_popup_dv">

            @if (auth()->user()->user_type == 'customer')
                <x-user.login-information />
            @endif
        </div>
    </div>

    {{-- freelancer popup --}}
    <div id="freelancer_green" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.embroidery.em_freelancer_green />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.vector.ve_freelancer_green />
            @endif
        </div>
    </div>
    <div id="freelancer_yellow" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.embroidery.em_freelancer_yellow />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.vector.ve_freelancer_yellow />
            @endif
        </div>
    </div>
    <div id="freelancer_red" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.embroidery.em_freelancer_red />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.vector.ve_freelancer_red />
            @endif
        </div>
    </div>
    <div id="freelancer_blue" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.embroidery.em_freelancer_blue />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.vector.ve_freelancer_blue />
            @endif
        </div>
    </div>
    <div id="freelancer_all" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <x-freelancer.embroidery.em_freelancer_all />
            @elseif(auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <x-freelancer.vector.ve_freelancer_all />
            @endif
        </div>
    </div>

    @include('components.freelancer.embroidery.em_freelancer_request')
    @include('components.freelancer.vector.ve_freelancer_request')
    @include('components.freelancer.free-order-detail')
    <div id="admin_customer_list" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'admin')
                <x-admin.customer_list />
            @endif
        </div>
    </div>
    <div id="admin_add_customer" class="lion_popup_wrrpr {{ session()->has('sidebar') ? 'active' : '' }}">
        <div class="lion_popup_dv">
            @if (auth()->user()->user_type == 'admin')
                <x-admin.add-customer />
            @endif
        </div>
    </div>
</div>
