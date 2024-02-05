@php
    $serial = 1;
@endphp
<section class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <h1 class="pagetitle" style="padding-bottom: 1vw !important;">
                {{ __('home.overview_of_orders') }}
            </h1>
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
                                <img src="/asset/images/tableColumn.svg" class="columnImage" alt="table column">
                                <span>{{ __('home.column') }}</span>
                            </button>
                            <div class="dropdown-menu megamenu" role="menu"
                                style="width:200px; padding:15px; font-size:13px">
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
                                    <button id="" class="CheckboxButton">STORNIEREN</button>
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
                                    <th style="text-align:center;">
                                        {{ __('home.order_type') }}</th>
                                    <th>{{ __('home.delivery_time') }}</th>
                                    <th>{{ __('home.order') }}</th>
                                    <th>{{ __('home.date') }}</th>
                                    <th>{{ __('home.order_from') }}</th>
                                    <th>{{ __('home.project') }}</th>
                                    <th>{{ __('home.status') }}</th>
                                    <th style="text-align:center;">{{ __('home.detail') }}
                                    </th>
                                    <th style="text-align:center;">{{ __('home.change') }}
                                    </th>
                                    <th style="text-align:center;">Änderung
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
