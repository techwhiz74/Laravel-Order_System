<section class="page_section">
    <div class="row">
        <div class="col-md-1 col-xl-2"></div>
        <div class="col-12 col-md-10 col-xl-8">
            <h1 class="pagetitle">
                {{ __('home.right_top_box_name') }}
            </h1>
            <div class="tab-content">
                <div class="responsive-table" style="width: 100%; font-size:13px">
                    <button style="display:none" id="customer_staffs_reload_button"></button>
                    <table id="customer_staffs" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('home.lastName') }},
                                    {{ __('home.firstName') }}</th>
                                <th>{{ __('home.email_address') }}</th>
                                <th>{{ __('home.created_on') }}</th>
                                <th style="text-align: center">{{ __('home.edit') }}</th>
                                <th style="text-align: center">{{ __('home.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="employee-top d-flex" style="align-items:flex-end">
                    <div class="submit_btn" id="customer_staff_create_button" type="button">
                        {{ __('home.add') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1 col-xl-2"></div>
    </div>

</section>
