<div class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <h1 class="pagetitle">
                {{ __('home.customer_em_parameters') }}
            </h1>
            <button style="display: none;" id="admin_parameter_em_table_reload_button"></button>
            <div>
                <input type="hidden" name="admin_em_parameter_customer_id">
                <div class="responsive-table">
                    <table id="admin_parameter_em_table" class="table table-striped"
                        style="width:100%; font-size:11.5px;">
                        <thead>
                            <tr>
                                <th>{{ __('home.customer_number') }}</th>
                                <th>{{ __('home.company') }}</th>
                                <th>{{ __('home.name') }}</th>
                                <th>{{ __('home.first_name') }}</th>
                                <th>{{ __('home.phone') }}</th>
                                <th>{{ __('home.email') }}</th>
                                <th>{{ __('home.street_number') }}</th>
                                <th>{{ __('home.postal_code') }}</th>
                                <th>{{ __('home.location') }}</th>
                                <th>{{ __('home.country') }}</th>
                                <th style="text-align:center;"><img
                                    src="{{ asset('asset/images/DetailIcon_admin.svg') }}" alt="order-detail-icon" class="icon_size">
                            </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>
</div>
