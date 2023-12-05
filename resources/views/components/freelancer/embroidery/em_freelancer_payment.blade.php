<section class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <div class="pagetitle">
                Order Counting </div>
            <div>
                <div>
                    <div class="responsive-table">
                        <button id="em_freelancer_payment_table_reload_button" style="display: none"></button>
                        <table id="em_freelancer_payment_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">
                                        {{ __('home.order_type') }}</th>
                                    <th>{{ __('home.delivery_time') }}</th>
                                    <th>{{ __('home.order') }}</th>
                                    <th>{{ __('home.date') }}</th>
                                    <th>{{ __('home.project') }}</th>
                                    <th style="text-align:center !important;">
                                        Counting Number</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="upload_btn" style="margin-top: -20px !important;">
                        <button class="btn btn-primary btn-block" id="em_payment_archive">Archive</button>
                        <button class="btn btn-primary btn-block" id="em_payment_mail">Payment</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>
</section>
@include('components.freelancer.embroidery.em_freelancer_payment_archive')
