@extends('layout.layout')
@section('content')
    <section id="bn_sec">
        {{-- <div class="container-fluid p-0">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide1.jpg') }}" class="d-block custom-width zoomable"
                            alt="CUTTER & BUCK" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide2.jpg') }}" class="d-block custom-width zoomable"
                            alt="" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide3.jpg') }}" class="d-block custom-width zoomable"
                            alt="CRAFT GRAVELWEAR" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide4.jpg') }}" class="d-block custom-width zoomable"
                            alt="UNSERE MARKENKATALOGE" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide5.jpg') }}" class="d-block custom-width zoomable"
                            alt="..." width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide6.jpg') }}" class="d-block custom-width zoomable"
                            alt="HOODIES & SWEATSHIRTS" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide7.jpg') }}" class="d-block custom-width zoomable"
                            alt="Softshell Jacken & Westen" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide8.jpg') }}" class="d-block custom-width zoomable"
                            alt="Sichtbar. Sicher." width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide9.jpg') }}" class="d-block custom-width zoomable"
                            alt="CRAFT" width="100%" height="600px">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('asset/images/image_slide10.jpg') }}" class="d-block custom-width zoomable"
                            alt="CRAFT FOOTWEAR" width="100%" height="600px">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div> --}}
        @auth
            @if (@auth()->user()->user_type == 'customer')
                <div class="customer_dashboard">
                    <div class="col-lg-6 col-md-12" style="padding-right: 2vw;">
                        <div>
                            <h3><strong>OFFENE BESTELLUNGEN</strong></h3>
                        </div>
                        <button id="customer_dahsboard_table_reload_button" style="display: none"></button>
                        <div class="responsive-table" style="margin-top: 20px; max-height:530px; overflow-y:hidden;">
                            <table id="customer_dashboard_table1" class="table table-striped" style="width:100%; font-size:13px;">
                                <thead>
                                    <tr>
                                        <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                        <th>{{ __('home.delivery_time') }}</th>
                                        <th>{{ __('home.order') }}</th>
                                        <th>{{ __('home.project') }}</th>
                                        <th>{{ __('home.status') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12" style="padding-left: 2vw;">
                        <div>
                            <h3><strong>ABGESCHLOSSENE BESTELLUNGEN</strong></h3>
                        </div>
                        <div class="responsive-table" style="margin-top: 20px; max-height:530px; overflow-y:hidden;">
                            <table id="customer_dashboard_table2" class="table table-striped"
                                style="width:100%; font-size:13px;">
                                <thead>
                                    <tr>
                                        <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                        <th>{{ __('home.delivery_time') }}</th>
                                        <th>{{ __('home.order') }}</th>
                                        <th>{{ __('home.project') }}</th>
                                        <th>{{ __('home.status') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 1)
                <div class="embroidery_freelancer_dashboard">
                    <div style="display: flex; height:31vh;">
                        <div class="col-lg-6 col-md-12" style="padding-right: 2vw;">
                            <div>
                                <h3><strong>Neue Offene Bestellungen</strong></h3>
                            </div>
                            <div class="responsive-table" style="max-height:27.5vh; overflow-y:hidden;">
                                <table id="em_freelancer_green_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12" style="padding-left: 2vw;">
                            <div>
                                <h3><strong>Bestellungen in Arbeit</strong></h3>
                            </div>
                            <div class="responsive-table" style=" max-height:27.5vh; overflow-y:hidden;">
                                <table id="em_freelancer_yellow_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; height:31vh; margin-top:3vh;">
                        <div class="col-lg-6 col-md-12" style="padding-right: 2vw;">
                            <div>
                                <h3><strong>Abgeschlossene Bestellungen</strong></h3>
                            </div>
                            <div class="responsive-table" style=" max-height:27.5vh; overflow-y:hidden;">
                                <table id="em_freelancer_red_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12" style="padding-left: 2vw;">
                            <div>
                                <h3><strong>Änderungsanforderungen</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (auth()->user()->user_type == 'freelancer' && auth()->user()->category_id == 2)
                <div class="vector_freelancer_dashboard">
                    <div style="display: flex; height:31vh;">
                        <div class="col-lg-6 col-md-12" style="padding-right: 2vw;">
                            <div>
                                <h3><strong>Neue Offene Bestellungen</strong></h3>
                            </div>
                            <div class="responsive-table" style="max-height:27.5vh; overflow-y:hidden;">
                                <table id="ve_freelancer_green_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12" style="padding-left: 2vw;">
                            <div>
                                <h3><strong>Bestellungen in Arbeit</strong></h3>
                            </div>
                            <div class="responsive-table" style=" max-height:27.5vh; overflow-y:hidden;">
                                <table id="ve_freelancer_yellow_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; height:31vh; margin-top:3vh;">
                        <div class="col-lg-6 col-md-12" style="padding-right: 2vw;">
                            <div>
                                <h3><strong>Abgeschlossene Bestellungen</strong></h3>
                            </div>
                            <div class="responsive-table" style=" max-height:27.5vh; overflow-y:hidden;">
                                <table id="ve_freelancer_red_dashboard_table" class="table table-striped"
                                    style="width:100%; font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="padding-left:20px;">{{ __('home.art') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th>{{ __('home.status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12" style="padding-left: 2vw;">
                            <div>
                                <h3><strong>Änderungsanforderungen</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (@auth()->user()->user_type == 'admin')
            @endif
        @else
            <div class="container-fluid p-0">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="{{ asset('asset/images/image_slide1.jpg') }}" class="d-block custom-width zoomable"
                                alt="CUTTER & BUCK" width="100%" height="600px">
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </section>
@endsection
<script></script>
