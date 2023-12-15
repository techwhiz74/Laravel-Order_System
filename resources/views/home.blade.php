@extends('layout.layout')
@section('content')
    <section id="bn_sec">
        @auth
            @if (auth()->user()->user_type == 'customer' && auth()->user()->id)
                <div class="dashboard_page customer_dashboard_page">
                    <div class="row">
                        <button style="display: none;" id="customer_dahsboard_table_reload_button"></button>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_new_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="customer_dashboard_green_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="showAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_complete_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="customer_dashboard_red_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="showAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_progress_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="customer_dashboard_yellow_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="showAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_change') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="customer_dashboard_blue_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="showAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chatting_div">
                    <div class="chatting_content">
                        <div class="chat_title">Zum Admin</div>
                        <div class="chatting_interface">
                        </div>
                        <div style="display:flex">
                            <textarea name=customer_chat_input class="form-control chat_input" style="font-size: 13px"></textarea>
                            <button type="button" class="chat_submit" id="customer_chat_submit"><i
                                    class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div type="button" class="chatting_button chatting_start" id="customer_chatting_start">
                        <i class="fa-regular fa-comment" style="margin: auto; color:#ffffff"></i>
                    </div>
                    <div class="chat_alert" id="customer_chat_alert">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <div type="button" class="chatting_button chatting_close" id="customer_chatting_close">
                        <i class="fa-solid fa-xmark" style="margin: auto; color:#ffffff"></i>
                    </div>
                </div>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <div class="dashboard_page ">
                    <button style="display: none;" id="em_freelancer_table_reload_btn"></button>
                    <div class="row">
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_new_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="em_freelancer_green_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerEmbroideryShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_progress_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="em_freelancer_yellow_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerEmbroideryShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_complete_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="em_freelancer_red_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerEmbroideryShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_change') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="em_freelancer_blue_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                            <th style="text-align:center;">
                                                {{ __('home.request') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerEmbroideryShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chatting_div">
                    <div class="chatting_content">
                        <div class="chat_title">To admin</div>
                        <div class="chatting_interface">
                        </div>
                        <div style="display:flex">
                            <textarea name=em_freelancer_chat_input class="form-control chat_input" style="font-size: 13px"></textarea>
                            <button type="button" class="chat_submit" id="em_freelancer_chat_submit"><i
                                    class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div type="button" class="chatting_button chatting_start" id="em_freelancer_chatting_start">
                        <i class="fa-regular fa-comment" style="margin: auto; color:#ffffff"></i>
                    </div>
                    <div class="chat_alert" id="em_freelancer_chat_alert">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <div type="button" class="chatting_button chatting_close" id="em_freelancer_chatting_close">
                        <i class="fa-solid fa-xmark" style="margin: auto; color:#ffffff"></i>
                    </div>
                </div>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <div class="dashboard_page">
                    <button style="display: none;" id="ve_freelancer_table_reload_btn"></button>
                    <div class="row">
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_new_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="ve_freelancer_green_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerVectorShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_progress_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="ve_freelancer_yellow_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerVectorShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_complete_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="ve_freelancer_red_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerVectorShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_change') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="ve_freelancer_blue_dashboard_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                            <th style="text-align:center;">
                                                {{ __('home.request') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="freelancerVectorShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chatting_div">
                    <div class="chatting_content">
                        <div class="chat_title">To admin</div>
                        <div class="chatting_interface">
                        </div>
                        <div style="display:flex">
                            <textarea name=ve_freelancer_chat_input class="form-control chat_input" style="font-size: 13px"></textarea>
                            <button type="button" class="chat_submit" id="ve_freelancer_chat_submit"><i
                                    class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div type="button" class="chatting_button chatting_start" id="ve_freelancer_chatting_start">
                        <i class="fa-regular fa-comment" style="margin: auto; color:#ffffff"></i>
                    </div>
                    <div class="chat_alert" id="ve_freelancer_chat_alert">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <div type="button" class="chatting_button chatting_close" id="ve_freelancer_chatting_close">
                        <i class="fa-solid fa-xmark" style="margin: auto; color:#ffffff"></i>
                    </div>
                </div>
            @elseif (auth()->user()->user_type == 'admin')
                <div class="dashboard_page">
                    <div class="row">
                        <button style="display: none;" id="admin_dashboard_table_reload_button"></button>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_new_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="admin_dashboard_green_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="adminShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_complete_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="admin_dashboard_red_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="adminShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_progress_order') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="admin_dashboard_yellow_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="adminShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6" style="padding:2vw 2vw 0 2vw">
                            <div class="dashboard_title">
                                <strong>{{ __('home.dashboard_change') }}</strong>
                            </div>
                            <div class="responsive-table">
                                <table id="admin_dashboard_blue_table" class="table table-striped dashboard_table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div style="display: flex; justify-content:flex-end; margin-top: -10px; margin-right:10px;">
                                    <button class="customer_dashboard_all_button"
                                        onClick="adminShowAllOrder()">{{ __('home.dashboard_view_all') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chatting_div">
                    <div class="chatting_content">
                        <div class="chat_title"></div>
                        <div class="chatting_interface">
                        </div>
                        <div style="display:flex">
                            <textarea name=admin_chat_input class="form-control chat_input" style="font-size: 13px"></textarea>
                            <button type="button" class="chat_submit" id="admin_chat_submit"><i
                                    class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div type="button" class="chatting_button chatting_start" id="admin_chatting_start">
                        <i class="fa-regular fa-comment" style="margin: auto; color:#ffffff"></i>
                    </div>
                    <div class="chat_alert" id="admin_chat_alert">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <div type="button" class="chatting_button chatting_close" id="admin_chatting_close">
                        <i class="fa-solid fa-xmark" style="margin: auto; color:#ffffff"></i>
                    </div>
                </div>
            @endif
        @else
            <div class="container-fluid p-0">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000"
                            style="display: flex; justify-content:center">
                            <img src="{{ asset('asset/images/image_slide1.jpg') }}"
                                class="d-block custom-width zoomable home_image" alt="CUTTER & BUCK">
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </section>
@endsection
