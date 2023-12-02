@php
    $serial = 1;
@endphp
<section class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <div class="pagetitle">
                {{ __('home.overview_of_orders') }}
            </div>
            <div>
                <div class="tableControl">
                    <div class="controlGroup1">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label>{{ __('home.search') }}</label>
                                <input type="text" id="tableSearchInput"
                                    placeholder="{{ __('home.search_placeholder') }}">
                            </div>
                            <div class="col-12 col-md-6">
                                <div style="display: flex">
                                    <div class="DatePickerWrapperStart">
                                        <label>{{ __('home.start_date') }}</label>
                                        <input type="text" class="datepicker" id="tableDatepickerInputStart">

                                    </div>
                                    <div class="DatePickerWrapperEnd">
                                        <label>{{ __('home.end_date') }}</label>
                                        <input type="text" class="datepicker" id="tableDatepickerInputEnd">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="refresh-button-wrapper" style="display: none;">
                            <button class="btn btn-primary" id="btn_table_refresh" title="Refresh"><i
                                    class="fa fa-sync"></i></button>
                        </div>
                    </div>
                    <div class="controlGroup2">
                        <div class="tableColumn dropdown">
                            <button class="tableCloumnBtton dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <img src="/asset/images/tableColumn.svg" class="columnImage" alt="">
                                <span>{{ __('home.column') }}</span>
                            </button>
                            <div class="dropdown-menu megamenu" role="menu"
                                style="width:190px; padding:15px; font-size:13px">
                                <div style="margin-bottom:10px;">{{ __('home.COLUMN') }}</div>
                                <label>
                                    <input type="checkbox" id="checkbox_order_type" class="option-input checkbox"
                                        checked />
                                    {{ __('home.order_type') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_delivery_time" class="option-input checkbox"
                                        checked />
                                    {{ __('home.delivery_time') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_order" class="option-input checkbox" checked />
                                    {{ __('home.order') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_date" class="option-input checkbox" checked />
                                    {{ __('home.date') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_ordered_from" class="option-input checkbox"
                                        checked />
                                    {{ __('home.order_from') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_project" class="option-input checkbox"
                                        checked />
                                    {{ __('home.project') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_status" class="option-input checkbox" checked />
                                    {{ __('home.status') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_detail" class="option-input checkbox" checked />
                                    {{ __('home.detail') }}
                                </label><br>
                                <label>
                                    <input type="checkbox" id="checkbox_change" class="option-input checkbox" checked />
                                    {{ __('home.change') }}
                                </label>

                                <div class="CheckboxButtons">
                                    <button id="" class="CheckboxButton">{{ __('home.cancel') }}</button>
                                    <button id="checkbox_apply" class="CheckboxButton">{{ __('home.apply') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="responsive-table">
                        <table id="view-order" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="min-width: 70px !important; text-align:center;">
                                        {{ __('home.order_type') }}</th>
                                    <th style="min-width: 100px !important;">{{ __('home.delivery_time') }}</th>
                                    <th style="min-width: 140px !important;">{{ __('home.order') }}</th>
                                    <th style="min-width: 140px !important;">{{ __('home.date') }}</th>
                                    <th style="min-width: 140px !important;">{{ __('home.order_from') }}</th>
                                    <th>{{ __('home.project') }}</th>
                                    <th style="min-width: 140px !important;">{{ __('home.status') }}</th>
                                    <th style="max-width: 70px !important; text-align:center;">{{ __('home.detail') }}
                                    </th>
                                    <th style="max-width: 80px !important; text-align:center;">{{ __('home.change') }}
                                    </th>
                                    <th style="max-width: 90px !important; text-align:center;">{{ __('home.request') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>

</section>
@include('components.user.order-detail')
@include('components.user.order-change')
@include('components.user.order-reqeust')
