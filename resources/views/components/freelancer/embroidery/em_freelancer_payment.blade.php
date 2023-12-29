<section class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <div class="pagetitle">
                Order Counting </div>
            <div>
                <div>
                    <button style="display: none" id="free_em_payment_sum_cal"></button>
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
                    <div style="display:flex; justify-content:end; margin: -30px 0 30px 0;">
                        <div class="total_count_number" id="free_em_sum">
                        </div>
                    </div>
                    <div class="upload_btn">
                        <button class="btn btn-primary btn-block" id="em_payment_archive">ARCHIVE</button>
                        <button class="btn btn-primary btn-block" id="free_em_payment_btn">PAYMENT</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>
</section>
